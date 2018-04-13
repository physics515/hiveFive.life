<?php
    if ( get_magic_quotes_gpc() ) {

        function stripslashes_deep( $value ) {
            $value = is_array( $value ) ?
                array_map( 'stripslashes_deep', $value ) :
                stripslashes( $value );
            return $value;
        }

        $_POST = array_map( 'stripslashes_deep', $_POST );
        $_GET = array_map( 'stripslashes_deep', $_GET );
        $_COOKIE = array_map( 'stripslashes_deep', $_COOKIE );
        $_REQUEST = array_map( 'stripslashes_deep', $_REQUEST );
    }

    define( 'APP_OBJECT_SELECTOR', '.ajax-poll' );
    define( 'APP_DEFAULT_TCLASS', 'app.ajax-poll' );
    define( 'APP_DEFAULT_TID', 'def' );
    define( 'APP_INIT_CMD', 'init' ); 
    define( 'TCLASS_DATA_FOLDER_PERMISSION', 0777 );
    define( 'SYS_VERSION', "1.00" );
    define( 'PATH_APP_CODE', dirname(__FILE__) . "/" );
    define( 'APP_CLASS_TAG', 'tclass' );
    define( 'APP_ID_TAG', 'tid' );

    class CJson
    {
        static function dqstr( $txt )
        {
            $txt = str_replace( "\\", "\\\\", $txt );
            $txt = str_replace( "\r", "\\r", $txt );
            $txt = str_replace( "\n", "\\n", $txt );
            $txt = str_replace( "\"", "\\\"", $txt );
            return $txt;
        }

        static function encode( &$data, $type = '' )
        {
            if ( $type == '-' )
            {
                return $data;
            }

            $ax = array();
            foreach( $data as $key => $val )
            {
                $type2 = ( substr($key,0,1) );
                switch( $type2 )
                {
                case "@":
                case "-":
                    $key = substr($key,1);
                    break;
                default:
                    $type2 = '';
                    break;
                }

                if ( $type == '' )
                {
                    $s = "\"{$key}\":";
                }
                else
                    $s = "";

                if ( is_array( $val ) )
                    $s .= CJson::encode( $val, $type2 );
                elseif ( $type2 == '-' )
                    $s .= $val;
                else
                    $s .= '"' . CJson::dqstr( $val ) . '"';

                $ax[] = $s;
            }

            $s = implode( ",", $ax );
            if ( $type == '' )
                $s = "{" . $s . "}";
            else
                $s = "[" . $s . "]";

            return $s;
        }

        static function decode( $json )
        {
            return json_decode( $json, true );
        }
    }


    class CTClassObject
    {
        function setup( $sys )
        {
            $this->sys =& $sys;

            return true;
        }

        function setupCmdSpec( &$cmdspec )
        {
        }

        function getTClassName()
        {
            return $this->sys->tclass;
        }

        function getIdName()
        {
            return $this->sys->tclass . '.' . $this->sys->tid;
        }

        function getFolderUrl()
        {
            $url = $this->sys->url_app_root . $this->sys->tclass . '/';
            return $url;
        }

        function getFolderPath()
        {
            return $this->path_tclass;
        }

        function getDataFolderPath()
        {
            return $this->getAppDataPath() . $this->getIdName() . '/';
        }

        function getAppDataPath()
        {
            return $this->sys->path_app_data;
        }

        function showErrorMsg( $err_msg )
        {
            if ( is_array( $err_msg ) )
            {
                $err_msg = implode( "<br/>", $err_msg );
            }

            $msg = '';
            $msg .= "<!--(ERRBOX)-->";
            $msg .= "<div style='padding:0px;border:1px solid red;";
            $msg .= "background-color:#fff0f0;'>";
            $msg .= "<div style='color:white;font-size:80%;font-weight:bold;";
            $msg .= "background-color:#ff0000;'>ERROR</div>";
            $msg .= "<div style='padding:10px;'>";
            $msg .= $err_msg;
            $msg .= "</div>";
            $msg .= "</div>";
            echo $msg;
        }

        function checkPermission( $ptype, $path ) {

            $msg = array();

            if ( strpos( $ptype, 'r' ) !== false ) {
                if ( !is_readable( $path ) ) {
                    CTClassSys::loadLang("app.requirements",$lng);
                    $msg[] = $lng[ 'err:cannot-read' ] . " [{$path}]";
                }
            }

            if ( strpos( $ptype, 'w' ) !== false ) {
                if ( !is_writeable( $path ) ) {
                    CTClassSys::loadLang("app.requirements",$lng);
                    $msg[] = $lng[ 'err:cannot-write' ] . " [{$path}]";
                }
            }

            $b_success = ( count( $msg ) == 0 );

            if ( !$b_success ) {
                $this->showErrorMsg( $msg );
            }

            return $b_success;
        }

        function processCmdSpec( &$spec, &$ret )
        {
            foreach( $spec as $cmd )
            {
                if ( substr( $cmd, 0, 1 ) == '@' )
                {
                    $cmd = substr( $cmd, 1 );
                    if ( method_exists( $this, $cmd ) )
                    {
                        if ( !call_user_func_array( array( $this, $cmd ), array( &$ret ) ) )
                        {
                            break;
                        }
                    }
                    else
                    {
                        $this->showErrorMsg( "method does not exist ({$cmd})" );
                        return false;
                    }
                }
                else
                {
                    $path1 = $this->sys->path_tclass . $cmd;
                    if ( file_exists( $path1 ) )
                    {
                        include( $path1 );
                    }
                    else
                    {
                        $path2 = $this->sys->path_base_tclass . $cmd;
                        if ( file_exists( $path2 ) )
                        {
                            include( $path2 );
                        }
                        else
                        {
                            $this->showErrorMsg(
                                "file does not exist ({$path1}), ({$path2})" );
                            return false;
                        }
                    }
                }
            }

            return true;
        }

        function run( $sys )
        {
            ob_start();

            if ( !$this->setup( $sys ) ) return false;

            //-- run the requested command
            $this->appid = $_REQUEST['appid'];
            $this->cmd = $_REQUEST['cmd'];

            $this->result = "OK";
            $ret = array();

            if (  array_key_exists( $this->cmd, $this->cmdspec ) )
            {
                $ret["cmd"] = "load";

                //-- get command spec
                $spec = $this->cmdspec[$this->cmd];

                //-- command redirection
                if ( !is_array( $spec ) )
                {
                    $spec = $this->cmdspec[$spec];
                }

                $this->processCmdSpec( $spec, $ret );
            }
            else
            {
                $ret["cmd"] = "alert";
                echo "Unknown Command [{$this->cmd}]";
            }

            $ret["html"] = ob_get_contents();
            ob_end_clean();
            $ret["result"] = $this->result;

            echo CJson::encode( $ret );

            return true;
        }
    }

    class CTClassSys {

        public static $cfg_params = array();

        public static function getConfigPath() {
            return self::$cfg_params['path-config'];
        }

        public static function getLangPath() {
            $path = self::$cfg_params['path-locale'];
            if ( !empty( self::$cfg_params['lang-code'] ) ) {
                $path .= self::$cfg_params['lang-code'] . '/';
            }
            return $path;
        }

        public static function loadConfig( $name, &$_cfg ) {
            include( self::getConfigPath() .
                "config.{$name}.inc.php" );
        }

        public static function loadLang( $name, &$_lng ) {
            include( self::getLangPath() .
                "locale.{$name}.inc.php" );
        }

        function fatalError( $msg ) {
            $json = array( "result" => $msg );
            echo CJson::encode( $json );
            exit;
        }

        function getThisPageURL() {
            $pageURL = 'http';
            if (( isset($_SERVER["HTTPS"]) ) && ( $_SERVER["HTTPS"] == "on" )) {
                $pageURL .= "s";
            }
            $pageURL .= "://" . $_SERVER["SERVER_NAME"];

            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= ":" . $_SERVER["SERVER_PORT"];
            }
            $pageURL .= $_SERVER['SCRIPT_NAME'];
            return $pageURL;
        }

        static function sanitizeFilename( $str ) {
            $str = substr( $str, 0, 255 );

            $res = '';
            $len = strlen( $str );
            for( $i = 0; $i < $len; $i++ ) {
                $ch = mb_substr( $str, $i, 1 );
                if (
                    ctype_alnum( $ch ) ||
                    ( $ch == '_' ) ||
                    ( $ch == '-' )
                ) {
                    $res .= $ch;
                } else {
                    $res .= '-';
                }
            }
            return $res;
        }

        function run() {
            $_cfg[ 'path-root' ]   = dirname(dirname(__FILE__)) . '/';
            $_cfg[ 'path-data' ] = $path . 'data/';
            $url_app_entry = getThisPageURL();
            $url_app_root = dirname($url_app_entry) . '/';
            $path_app_root = $_cfg['path-root'];
            $app_object_selector = APP_OBJECT_SELECTOR;
            $app_init_cmd = APP_INIT_CMD;

            if ( isset( $_REQUEST['cmd'] ) ) {

                if ( isset( $_REQUEST[APP_CLASS_TAG] ) && !empty( $_REQUEST[APP_CLASS_TAG] ) ) {
                    $tclass = sanitizeFilename( $_REQUEST[APP_CLASS_TAG] );
                } else {
                    $tclass = APP_DEFAULT_TCLASS;
                }

                if ( isset( $_REQUEST[APP_ID_TAG] ) && !empty( $_REQUEST[APP_ID_TAG] ) ) {
                    $tid = sanitizeFilename( $_REQUEST[APP_ID_TAG] );
                } else {
                    $tid = APP_DEFAULT_TID;
                }

                $path_app_data = $_cfg['path-data'];
                $path_tclass = $path_app_root . $tclass . "/";

                //BASE TCLASS
                $base_tclass = "ajax-poll";
                $folder_base_tclass = "app." . $base_tclass;
                $path_base_tclass = $path_app_root . $folder_base_tclass . "/";

                function attr( $key, $val = null ) {
                    if ( is_null( $val ) ) {
                        if ( isset( $_attr_[$key] ) ) {
                            return $_attr_[$key];
                        } else {
                            return null;
                        }
                    } else {
                        $attr_[$key] = $val;
                    }
                }
            
                function getName() {
                    return $name;
                }
            
                function getCount() {
                    return $cnt;
                }
            
                function getPercent( $precision = 0 ) {
                    $total = $prt->getTotal();
                    if ( $total == 0 ) {
                        $v = 0;
                    } else {
                        $v = ( 100 * getCount() ) / $total;
                    }
                    $v = round( $v, $precision );
                    $v = sprintf( "%01.{$precision}f", $v );
                    return $v;
                }
            
                function getWRatio() {
                    $max_count = $prt->getMaxCount();
                    if ( $max_count == 0 ) { return 0; }
                    return round( getCount() / $max_count, 2 );
                }
            
                function isVoted() {
                    return $prt->hasVoted( getName() );
                }
            
                function setCount( $cnt ) {
                    if ( !isInteger( $cnt ) ) { $cnt = 0; }
                    $cnt = intval( $cnt );
                }
            
                function incCount( $d = 1 ) {
                    $cnt += $d;
                }
            
                function isInteger( $v ) {
                    if ( strlen( $v ) == 0 ) { return false; }
                    if ( !is_numeric( $v ) ) { return false; }
                    if ( doubleval( $v ) - intval( $v ) != 0 ) { return false; }
                    return true;
                }
            
                function setup( $sys, $prt, $name ) {
                    $sys =& $sys;
                    $prt =& $prt;
                    $name = $name;
            
                    //-- attributes
                    $_attr_ = array();
            
                    //-- count
                    $cnt = 0;
                }

                function attr( $key, $val = null ) {
                    if ( is_null( $val ) ) {
                        if ( isset( $_attr_[$key] ) ) {
                            return $_attr_[$key];
                        } else {
                            return null;
                        }
                    } else {
                        $_attr_[$key] = $val;
                    }
                }
            
                function hasVoted( $name = null ) {
                    return $prt->checkCkBlock( $name );
                }
            
                function getTotal() {
                    return $total;
                }
            
                function setMaxWidth( $max_width ) {
                    $max_width = $max_width;
                }
            
                function getMaxWidth() {
                    return $max_width;
                }
            
                function getMaxCount() {
                    return $max_count;
                }
            
                function getNumOfItems() {
                    return count( $items );
                }
            
                function getAllItems() {
                    return $items;
                }
            
                function getItem( $key = null ) {
                    $err_msg = array();
            
                    if ( is_null($key) ) {
                        if ( !isset( $item_idx ) ) {
                            $item_idx = 0;
                        }
            
                        if ( $item_idx >= count($item_key_list) ) {
                            return $dummy_item;
                        } else {
                            $key = $item_key_list[$item_idx];
                            $item_idx++;
                            return $items[$key];
                        }
                    } else if ( !isset( $items[$key] ) ) {
                        $err_msg[] = "getItem( key ) : Unknown Item Key ({$key})";
                    }
            
                    if ( count( $err_msg ) > 0 ) {
                        $prt->showErrorMsg( $err_msg );
                    }
            
                    return $items[$key];
                }
            
                function addItem( $key ) {
                    $item = new CPollItem();
                    $item->setup( $sys, null, $key );
                    $items[$key] = $item;
                    $item_key_list[$item_key_idx] = $key;
                    $item_key_idx++;
                    return $item;
                }
            
                function calcStats() {
                    $total = 0;
                    $max_count = 0;
                    foreach( $items as $key => $item ) {
                        $count = $item->getCount();
                        $total += $count;
                        if ( $max_count < $count ) $max_count = $count;
                    }
                    $total = $total;
                    $max_count = $max_count;
                }
            
                function getFolderUrl() {
                    return $prt->getFolderUrl();
                }
            
                function started() {
                    return !(
                        ( !empty( $_attr_[ 'dt-start' ] ) ) &&
                        ( strtotime( $_attr_[ 'dt-start' ] ) > time() )
                    );
                }
            
                function ended() {
                    return (
                        ( !empty( $_attr_[ 'dt-end' ] ) ) &&
                        ( strtotime( $_attr_[ 'dt-end' ] ) < time() )
                    );
                }
            
                function setup( $sys, $prt ) {
                    $sys =& $sys;
                    $prt =& $prt;
            
                    //-- attributes
                    $_attr_ = array();
            
                    //-- poll items
                    $items = array();
                    $item_key_list = array();
                    $item_key_idx = 0;
            
                    //-- dummy item
                    $dummy_item = new CPollItem();
                    $dummy_item->setup( $sys, null, null );
            
                    //-- default max width
                    setMaxWidth( 100 );
            
                    return true;
                }
            
                function getDataFilePath() {
                    return $prt->getDataFolderPath() . "votes.txt";
                }
            
                function load( $b_vote = false ) {
                    $path = getDataFilePath();
                    if ( !file_exists( $path ) ) touch( $path );
                    if ( !$prt->checkPermission( 'rw', $path ) ) return false;
            
                    $handle = @fopen( $path, "r+" );
            
                    //-- do an exclusive lock
                    if ( !( @flock( $handle, LOCK_EX ) ) ) {
                        $this->prt->showErrorMsg( "Can not write [app.data] ({$path})" .
                            " (Could not get the lock!)" );
                        return false;
                    }
            
                    $txt = '';
                    $size = filesize( $path );
                    if ( $size > 0 ) {
                        $txt = fread( $handle, $size );
                    }
            
                    //-- load into CPollItem
                    $txt = str_replace( "\r", "", $txt );
                    $ax = explode( "\n", $txt );
                    foreach( $ax as $ln ) {
                        if ( strpos( $ln, "=" ) !== false ) {
                            $bx = explode( "=", $ln );
                            if ( array_key_exists( $bx[0], $this->items ) ) {
                                $item = $this->items[ $bx[0] ];
                                $item->setCount( $bx[1] );
                            }
                        }
                    }
            
                    //-- add votes
                    $answer = isset( $_REQUEST['answer'] ) ? $_REQUEST['answer'] : "";
                    $answer = json_decode( $answer, true );
                    if ( $b_vote && !empty($answer) ) {
                        $b_found = false;
                        foreach( $answer as $ans ) {
                            if ( isset( $this->items[$ans] ) ) {
                                $item = $this->items[$ans];
                                $item->incCount();
                                $b_found = true;
                            }
                        }
            
                        if ( $b_found ) {
                            //-- truncate file
                            fseek( $handle, 0 );
                            ftruncate( $handle, 0 );
            
                            //-- write votes to txt file
                            fwrite( $handle, $this->getDataTxt() );
                        } else {
                            $this->prt->showErrorMsg( "Item ({$answer}) not declared" );
                        }
                    }
            
                    //-- release the lock
                    flock( $handle, LOCK_UN );
            
                    //-- close the file
                    fclose($handle);
            
                    return true;
                }
            
                function getDataTxt() {
                    $ax = array();
                    foreach( $this->items as $key => $item ) {
                        $ax[] = "{$key}=" . $item->getCount();
                    }
                    return implode( "\r\n", $ax );
                }

                function setup( $path_data )
                {
                    $this->path_data = $path_data;
                    $this->ipaddr = null;
                    if ( isset($_SERVER['REMOTE_ADDR']) )
                        $this->ipaddr = $_SERVER['REMOTE_ADDR'];
                }

                function add()
                {
                    if ( is_null($this->ipaddr) )
                    {
                        return false;
                    }
                    else
                    {
                        file_put_contents( $this->path_data, "={$this->ipaddr}\r\n", FILE_APPEND | LOCK_EX );
                        return true;
                    }
                }

                function exists()
                {
                    if ( is_null($this->ipaddr) )
                    {
                        return false;
                    }
                    else if ( !file_exists( $this->path_data ) )
                    {
                        return true;
                    }
                    else
                    {
                        $txt = file_get_contents( $this->path_data );
                        return ( strpos( $txt, "={$this->ipaddr}\r\n" ) !== false );
                    }
                }

                function validate()
                {
                    if ( $this->exists() )
                        return false;
                    else
                        return $this->add();
                }

                function clear()
                {
                    if ( file_exists( $this->path_data ) )
                    {
                        $txt = file_get_contents( $this->path_data, LOCK_EX );
                        $txt = str_replace( "={$this->ipaddr}\r\n", "", $txt );
                        file_put_contents( $this->path_data, $txt, LOCK_EX );
                    }
                    return true;
                }
                function setup( $cookie_key, $period = null ) {
                    //-- cookie name must not contain '.'
                    $cookie_key = str_replace( '.', '-', $cookie_key );

                    $this->cookie_key = $cookie_key;
                    if ( is_null($period) ) {
                        $period = 60*60*24*365;
                    }
                    $this->period = $period;
                }

                function add( $val = 'yes' ) {
                    setcookie( $this->cookie_key, $val, time() + $this->period );
                    $_COOKIE[$this->cookie_key] = $val;
                    return true;
                }

                function get() {
                    if ( isset($_COOKIE[$this->cookie_key]) ) {
                        return $_COOKIE[$this->cookie_key];
                    } else {
                        return '';
                    }
                }

                function exists() {
                    return ( isset($_COOKIE[$this->cookie_key]) );
                }

                function validate() {
                    if ( $this->exists() ) {
                        return false;
                    } else {
                        return true;
                    }
                }

                function clear() {
                    setcookie( $this->cookie_key, "", time()-3600 );
                    return true;
                }

                function setup( $sys ) {
                    if ( !parent::setup( $sys ) ) { return false; }
            
                    //-- setup data folder
                    if ( !$this->setupDataFolder() ) { return false; }
            
                    //-- setup poll & poll items
                    $this->poll = new CPoll();
                    if ( !$this->poll->setup( $sys, $this ) ) { return false; }
                    if ( !$this->setupPoll( $this->poll ) ) { return false; }
            
                    //-- Cookie Block
                    $name = $this->getCookieBlockName();
                    $this->ckblock = new CCookieBlock();
                    $this->ckblock->setup( $name );
            
                    //-- cmdpsec
                    $this->cmdspec = array();
                    if ( !$this->setupCmdSpec( $this->cmdspec ) ) { return false; }
            
                    return true;
                }
                
                function checkCkBlock( $name = null ) {
                    if ( $this->poll->attr( "enable-cookie-block" ) ) {
                        if ( is_null( $name ) ) {
                            return $this->ckblock->exists();
                        } else {
                            if ( $this->ckblock->exists() ) {
                                return in_array( $name,
                                    explode( "\t", $this->ckblock->get() ) );
                            } else {
                                return false;
                            }
                        }
                    } else {
                        return false;
                    }
                }
            
                function setupDataFolder() {
                    //-- check app data folder
                    $path = $this->getAppDataPath();
                    if ( !$this->checkPermission( "rw", $path ) ) {
                        return false;
                    }
            
                    //-- tclass data folder exists?
                    $path = $this->getDataFolderPath();
                    if ( !file_exists( $path ) ) {
                        @mkdir( $path );
                        @chmod( $path, TCLASS_DATA_FOLDER_PERMISSION );
                        if ( !file_exists( $path ) ) {
                            $err_msg = "Can not create a folder in [app.data]";
                            $this->showErrorMsg( $err_msg );
                            return false;
                        }
                    }
            
                    return true;
                }
            
                function setupCmdSpec( &$cmdspec ) {
                    parent::setupCmdSpec( $cmdspec );
            
                    if ( $this->poll->ended() ) {
                        $cmdspec["init"] = "result";
                    } else {
                        $cmdspec["init"] = "front";
                    }
            
                    $cmdspec["front"] = array(
                        "@hd_front",
                        "tpl.front.inc.php",
                        "js.front.inc.php",
                    );
            
                    $cmdspec["result"] = array(
                        "@hd_result",
                        "tpl.result.inc.php",
                        "js.result.inc.php",
                    );
            
                    $cmdspec["vote"] = array(
                        "@hd_vote",
                        "tpl.result.inc.php",
                        "js.result.inc.php",
                    );
            
                    $cmdspec["clear_block"] = array(
                        "@hd_clear_block",
                    );
            
                    return true;
                }
            
                function addStyle( $style ) {
                    $style = str_replace( "%tclass%", $this->getTClassName(), $style );
                    $style = str_replace( "\r", "\\r", $style );
                    $style = str_replace( "\n", "\\n", $style );
                    $style = str_replace( "\"", "\\\"", $style );
                    $s = "";
                    $s .= "<script>(function(\$){";
                    $s .= "\$('head').append( \"{$style}\" );";
                    $s .= "}(jQuery));</script>";
                    echo $s;
                }
            
                function checkDataFilePerm( $path ) {
                    if ( !file_exists( $path ) ) {
                        if ( is_writable( dirname($path) ) ) {
                            touch( $path );
                        } else {
                            return $this->checkPermission( 'rw', dirname($path) );
                        }
                    }
                    return $this->checkPermission( 'rw', $path );
                }
            
                function getIPBlockFilePath() {
                    return $this->getDataFolderPath() . "ip-block.txt";
                }
            
                function getCookieBlockName() {
                    return $this->getIdName() . ".cookie-block";
                }
            
                function hd_front( &$ret ) {
                    return true;
                }
            
                function hd_result( &$ret ) {
                    $this->poll->load();
                    $this->poll->calcStats();
                    return true;
                }
            
                function hd_vote( &$ret ) {
            
                    //-- IP Block
                    if ( $this->poll->attr( "enable-ip-block" ) ) {
                        $path = $this->getIPBlockFilePath();
                        if ( !$this->checkDataFilePerm( $path ) ) { return false; }
            
                        $ipblock = new CIPBlock();
                        $ipblock->setup( $path );
                        if ( !$ipblock->validate() ) {
                            $ret["cmd"] = "none";
                            $ret["msg"] = array( "cmd" => "already_voted" );
                            return false;
                        }
                    }
            
                    //-- Cookie Block
                    if ( $this->poll->attr( "enable-cookie-block" ) ) {
                        $cookie_name = $this->getCookieBlockName();
                        $cookie_block = new CCookieBlock();
                        $cookie_block->setup( $cookie_name,
                            $this->poll->attr( "cookie-block-period" ) );
                        if ( !$cookie_block->validate() ) {
                            $ret["cmd"] = "none";
                            $ret["msg"] = array( "cmd" => "already_voted" );
                            return false;
                        }
                    }
            
                    //-- Load Data
                    $this->poll->load(true);
                    $this->poll->calcStats();
            
                    //-- store choice in cookie
                    if ( isset( $cookie_block ) ) {
                        $answer = isset( $_REQUEST['answer'] ) ? $_REQUEST['answer'] : "";
                        $answer = json_decode( $answer, true );
                        $val = implode( "\t", $answer );
                        $cookie_block->add( $val );
                    }
            
                    //-- return response
                    $ret["msg"] = array( "cmd" => "thank_you" );
                    return true;
                }
            
                function hd_clear_block( &$ret ) {
                    $ret["cmd"] = "alert";
            
                    if ( $this->poll->attr( "b-reset-block" ) ) {
            
                        CTClassSys::loadLang('ajax.block',$lng);
                        $msg_ip_block_reset = $lng[ 'msg:ip-block-reset' ];
                        $msg_ip_block_not_reset = $lng[ 'msg:ip-block-not-reset' ];
                        $msg_cookie_block_reset = $lng[ 'msg:cookie-block-reset' ];
                        $msg_cookie_block_not_reset = $lng[ 'msg:cookie-block-not-reset' ];
            
                        //-- IP Block
                        $path = $this->getIPBlockFilePath();
                        if ( !$this->checkDataFilePerm( $path ) ) return false;
                        $ipblock = new CIPBlock();
                        $ipblock->setup( $path );
                        if ( $ipblock->clear() ) {
                            echo $msg_ip_block_reset . "\r\n";
                        } else {
                            echo $msg_ip_block_not_reset . "\r\n";
                        }
            
                        //-- Cookie Block
                        $cookie_name = $this->getCookieBlockName();
                        $cookie_block = new CCookieBlock();
                        $cookie_block->setup( $cookie_name,
                            $this->poll->attr( "cookie-block-period" ) );
                        if ( $cookie_block->clear() ) {
                            echo $msg_cookie_block_reset . "\r\n";
                        } else {
                            echo $msg_cookie_block_not_reset . "\r\n";
                        }
                    } else {
                        echo "Unauthorized Access\r\n";
                    }
            
                    return true;
                }

                //-- load CTClassBase
                $this->loadTClassFile( "class-base.inc.php" ); 

                //-- load CTClass
                $this->loadTClassFile( "class.inc.php" ); 

                //-- start-up
                $obj = new CTClass();
                $obj->run( $this );

            } else {
                header('Content-Type: application/javascript');
                include( PATH_APP_CODE . 'tclass.js.inc.php' );
            }
        }
    }
    CTClassSys()->run();
?>