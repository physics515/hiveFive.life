<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * phpbb_cache_container.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class phpbb_cache_container extends Symfony\Component\DependencyInjection\ContainerBuilder
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->scopes = array();
        $this->scopeChildren = array();
        $this->methodMap = array(
            'acl.permissions' => 'getAcl_PermissionsService',
            'attachment.delete' => 'getAttachment_DeleteService',
            'attachment.manager' => 'getAttachment_ManagerService',
            'attachment.resync' => 'getAttachment_ResyncService',
            'attachment.upload' => 'getAttachment_UploadService',
            'auth' => 'getAuthService',
            'auth.provider.apache' => 'getAuth_Provider_ApacheService',
            'auth.provider.db' => 'getAuth_Provider_DbService',
            'auth.provider.ldap' => 'getAuth_Provider_LdapService',
            'auth.provider.oauth' => 'getAuth_Provider_OauthService',
            'auth.provider.oauth.service.bitly' => 'getAuth_Provider_Oauth_Service_BitlyService',
            'auth.provider.oauth.service.facebook' => 'getAuth_Provider_Oauth_Service_FacebookService',
            'auth.provider.oauth.service.google' => 'getAuth_Provider_Oauth_Service_GoogleService',
            'auth.provider.oauth.service.twitter' => 'getAuth_Provider_Oauth_Service_TwitterService',
            'auth.provider.oauth.service_collection' => 'getAuth_Provider_Oauth_ServiceCollectionService',
            'auth.provider_collection' => 'getAuth_ProviderCollectionService',
            'avatar.driver.gravatar' => 'getAvatar_Driver_GravatarService',
            'avatar.driver.local' => 'getAvatar_Driver_LocalService',
            'avatar.driver.remote' => 'getAvatar_Driver_RemoteService',
            'avatar.driver.upload' => 'getAvatar_Driver_UploadService',
            'avatar.driver_collection' => 'getAvatar_DriverCollectionService',
            'avatar.manager' => 'getAvatar_ManagerService',
            'cache' => 'getCacheService',
            'cache.driver' => 'getCache_DriverService',
            'captcha.factory' => 'getCaptcha_FactoryService',
            'captcha.plugins.service_collection' => 'getCaptcha_Plugins_ServiceCollectionService',
            'class_loader' => 'getClassLoaderService',
            'class_loader.ext' => 'getClassLoader_ExtService',
            'config' => 'getConfigService',
            'config.php' => 'getConfig_PhpService',
            'config_text' => 'getConfigTextService',
            'console.command.cache.purge' => 'getConsole_Command_Cache_PurgeService',
            'console.command.config.delete' => 'getConsole_Command_Config_DeleteService',
            'console.command.config.get' => 'getConsole_Command_Config_GetService',
            'console.command.config.increment' => 'getConsole_Command_Config_IncrementService',
            'console.command.config.set' => 'getConsole_Command_Config_SetService',
            'console.command.config.set_atomic' => 'getConsole_Command_Config_SetAtomicService',
            'console.command.cron.list' => 'getConsole_Command_Cron_ListService',
            'console.command.cron.run' => 'getConsole_Command_Cron_RunService',
            'console.command.db.list' => 'getConsole_Command_Db_ListService',
            'console.command.db.migrate' => 'getConsole_Command_Db_MigrateService',
            'console.command.db.revert' => 'getConsole_Command_Db_RevertService',
            'console.command.dev.migration_tips' => 'getConsole_Command_Dev_MigrationTipsService',
            'console.command.extension.disable' => 'getConsole_Command_Extension_DisableService',
            'console.command.extension.enable' => 'getConsole_Command_Extension_EnableService',
            'console.command.extension.purge' => 'getConsole_Command_Extension_PurgeService',
            'console.command.extension.show' => 'getConsole_Command_Extension_ShowService',
            'console.command.fixup.fix_left_right_ids' => 'getConsole_Command_Fixup_FixLeftRightIdsService',
            'console.command.fixup.recalculate_email_hash' => 'getConsole_Command_Fixup_RecalculateEmailHashService',
            'console.command.fixup.update_hashes' => 'getConsole_Command_Fixup_UpdateHashesService',
            'console.command.reparser.list' => 'getConsole_Command_Reparser_ListService',
            'console.command.reparser.reparse' => 'getConsole_Command_Reparser_ReparseService',
            'console.command.thumbnail.delete' => 'getConsole_Command_Thumbnail_DeleteService',
            'console.command.thumbnail.generate' => 'getConsole_Command_Thumbnail_GenerateService',
            'console.command.thumbnail.recreate' => 'getConsole_Command_Thumbnail_RecreateService',
            'console.command.update.check' => 'getConsole_Command_Update_CheckService',
            'console.command.user.activate' => 'getConsole_Command_User_ActivateService',
            'console.command.user.add' => 'getConsole_Command_User_AddService',
            'console.command.user.delete' => 'getConsole_Command_User_DeleteService',
            'console.command.user.reclean' => 'getConsole_Command_User_RecleanService',
            'console.command_collection' => 'getConsole_CommandCollectionService',
            'console.exception_subscriber' => 'getConsole_ExceptionSubscriberService',
            'content.visibility' => 'getContent_VisibilityService',
            'controller.helper' => 'getController_HelperService',
            'controller.resolver' => 'getController_ResolverService',
            'core.captcha.plugins.gd' => 'getCore_Captcha_Plugins_GdService',
            'core.captcha.plugins.gd_wave' => 'getCore_Captcha_Plugins_GdWaveService',
            'core.captcha.plugins.nogd' => 'getCore_Captcha_Plugins_NogdService',
            'core.captcha.plugins.qa' => 'getCore_Captcha_Plugins_QaService',
            'core.captcha.plugins.recaptcha' => 'getCore_Captcha_Plugins_RecaptchaService',
            'cron.lock_db' => 'getCron_LockDbService',
            'cron.manager' => 'getCron_ManagerService',
            'cron.task.core.prune_all_forums' => 'getCron_Task_Core_PruneAllForumsService',
            'cron.task.core.prune_forum' => 'getCron_Task_Core_PruneForumService',
            'cron.task.core.prune_notifications' => 'getCron_Task_Core_PruneNotificationsService',
            'cron.task.core.prune_shadow_topics' => 'getCron_Task_Core_PruneShadowTopicsService',
            'cron.task.core.queue' => 'getCron_Task_Core_QueueService',
            'cron.task.core.tidy_cache' => 'getCron_Task_Core_TidyCacheService',
            'cron.task.core.tidy_database' => 'getCron_Task_Core_TidyDatabaseService',
            'cron.task.core.tidy_plupload' => 'getCron_Task_Core_TidyPluploadService',
            'cron.task.core.tidy_search' => 'getCron_Task_Core_TidySearchService',
            'cron.task.core.tidy_sessions' => 'getCron_Task_Core_TidySessionsService',
            'cron.task.core.tidy_warnings' => 'getCron_Task_Core_TidyWarningsService',
            'cron.task.core.update_hashes' => 'getCron_Task_Core_UpdateHashesService',
            'cron.task.text_reparser.pm_text' => 'getCron_Task_TextReparser_PmTextService',
            'cron.task.text_reparser.poll_option' => 'getCron_Task_TextReparser_PollOptionService',
            'cron.task.text_reparser.poll_title' => 'getCron_Task_TextReparser_PollTitleService',
            'cron.task.text_reparser.post_text' => 'getCron_Task_TextReparser_PostTextService',
            'cron.task.text_reparser.user_signature' => 'getCron_Task_TextReparser_UserSignatureService',
            'cron.task_collection' => 'getCron_TaskCollectionService',
            'dbal.conn' => 'getDbal_ConnService',
            'dbal.conn.driver' => 'getDbal_Conn_DriverService',
            'dbal.extractor' => 'getDbal_ExtractorService',
            'dbal.extractor.extractors.mssql_extractor' => 'getDbal_Extractor_Extractors_MssqlExtractorService',
            'dbal.extractor.extractors.mysql_extractor' => 'getDbal_Extractor_Extractors_MysqlExtractorService',
            'dbal.extractor.extractors.oracle_extractor' => 'getDbal_Extractor_Extractors_OracleExtractorService',
            'dbal.extractor.extractors.postgres_extractor' => 'getDbal_Extractor_Extractors_PostgresExtractorService',
            'dbal.extractor.extractors.sqlite3_extractor' => 'getDbal_Extractor_Extractors_Sqlite3ExtractorService',
            'dbal.extractor.factory' => 'getDbal_Extractor_FactoryService',
            'dbal.tools' => 'getDbal_ToolsService',
            'dbal.tools.factory' => 'getDbal_Tools_FactoryService',
            'dispatcher' => 'getDispatcherService',
            'ext.manager' => 'getExt_ManagerService',
            'feed.forum' => 'getFeed_ForumService',
            'feed.forums' => 'getFeed_ForumsService',
            'feed.helper' => 'getFeed_HelperService',
            'feed.news' => 'getFeed_NewsService',
            'feed.overall' => 'getFeed_OverallService',
            'feed.topic' => 'getFeed_TopicService',
            'feed.topics' => 'getFeed_TopicsService',
            'feed.topics_active' => 'getFeed_TopicsActiveService',
            'file_downloader' => 'getFileDownloaderService',
            'file_locator' => 'getFileLocatorService',
            'files.factory' => 'getFiles_FactoryService',
            'files.filespec' => 'getFiles_FilespecService',
            'files.types.form' => 'getFiles_Types_FormService',
            'files.types.local' => 'getFiles_Types_LocalService',
            'files.types.remote' => 'getFiles_Types_RemoteService',
            'files.upload' => 'getFiles_UploadService',
            'filesystem' => 'getFilesystemService',
            'group_helper' => 'getGroupHelperService',
            'groupposition.legend' => 'getGroupposition_LegendService',
            'groupposition.teampage' => 'getGroupposition_TeampageService',
            'hook_finder' => 'getHookFinderService',
            'http_kernel' => 'getHttpKernelService',
            'kernel_exception_subscriber' => 'getKernelExceptionSubscriberService',
            'kernel_terminate_subscriber' => 'getKernelTerminateSubscriberService',
            'language' => 'getLanguageService',
            'language.helper.language_file' => 'getLanguage_Helper_LanguageFileService',
            'language.loader' => 'getLanguage_LoaderService',
            'log' => 'getLogService',
            'message.form.admin' => 'getMessage_Form_AdminService',
            'message.form.topic' => 'getMessage_Form_TopicService',
            'message.form.user' => 'getMessage_Form_UserService',
            'migrator' => 'getMigratorService',
            'migrator.helper' => 'getMigrator_HelperService',
            'migrator.tool.config' => 'getMigrator_Tool_ConfigService',
            'migrator.tool.config_text' => 'getMigrator_Tool_ConfigTextService',
            'migrator.tool.module' => 'getMigrator_Tool_ModuleService',
            'migrator.tool.permission' => 'getMigrator_Tool_PermissionService',
            'migrator.tool_collection' => 'getMigrator_ToolCollectionService',
            'mimetype.content_guesser' => 'getMimetype_ContentGuesserService',
            'mimetype.extension_guesser' => 'getMimetype_ExtensionGuesserService',
            'mimetype.filebinary_mimetype_guesser' => 'getMimetype_FilebinaryMimetypeGuesserService',
            'mimetype.fileinfo_mimetype_guesser' => 'getMimetype_FileinfoMimetypeGuesserService',
            'mimetype.guesser' => 'getMimetype_GuesserService',
            'mimetype.guesser_collection' => 'getMimetype_GuesserCollectionService',
            'module.manager' => 'getModule_ManagerService',
            'notification.method.board' => 'getNotification_Method_BoardService',
            'notification.method.email' => 'getNotification_Method_EmailService',
            'notification.method.jabber' => 'getNotification_Method_JabberService',
            'notification.method_collection' => 'getNotification_MethodCollectionService',
            'notification.type.admin_activate_user' => 'getNotification_Type_AdminActivateUserService',
            'notification.type.approve_post' => 'getNotification_Type_ApprovePostService',
            'notification.type.approve_topic' => 'getNotification_Type_ApproveTopicService',
            'notification.type.bookmark' => 'getNotification_Type_BookmarkService',
            'notification.type.disapprove_post' => 'getNotification_Type_DisapprovePostService',
            'notification.type.disapprove_topic' => 'getNotification_Type_DisapproveTopicService',
            'notification.type.group_request' => 'getNotification_Type_GroupRequestService',
            'notification.type.group_request_approved' => 'getNotification_Type_GroupRequestApprovedService',
            'notification.type.pm' => 'getNotification_Type_PmService',
            'notification.type.post' => 'getNotification_Type_PostService',
            'notification.type.post_in_queue' => 'getNotification_Type_PostInQueueService',
            'notification.type.quote' => 'getNotification_Type_QuoteService',
            'notification.type.report_pm' => 'getNotification_Type_ReportPmService',
            'notification.type.report_pm_closed' => 'getNotification_Type_ReportPmClosedService',
            'notification.type.report_post' => 'getNotification_Type_ReportPostService',
            'notification.type.report_post_closed' => 'getNotification_Type_ReportPostClosedService',
            'notification.type.topic' => 'getNotification_Type_TopicService',
            'notification.type.topic_in_queue' => 'getNotification_Type_TopicInQueueService',
            'notification.type_collection' => 'getNotification_TypeCollectionService',
            'notification_manager' => 'getNotificationManagerService',
            'pagination' => 'getPaginationService',
            'passwords.driver.bcrypt' => 'getPasswords_Driver_BcryptService',
            'passwords.driver.bcrypt_2y' => 'getPasswords_Driver_Bcrypt2yService',
            'passwords.driver.bcrypt_wcf2' => 'getPasswords_Driver_BcryptWcf2Service',
            'passwords.driver.convert_password' => 'getPasswords_Driver_ConvertPasswordService',
            'passwords.driver.md5_mybb' => 'getPasswords_Driver_Md5MybbService',
            'passwords.driver.md5_phpbb2' => 'getPasswords_Driver_Md5Phpbb2Service',
            'passwords.driver.md5_vb' => 'getPasswords_Driver_Md5VbService',
            'passwords.driver.phpass' => 'getPasswords_Driver_PhpassService',
            'passwords.driver.salted_md5' => 'getPasswords_Driver_SaltedMd5Service',
            'passwords.driver.sha1' => 'getPasswords_Driver_Sha1Service',
            'passwords.driver.sha1_smf' => 'getPasswords_Driver_Sha1SmfService',
            'passwords.driver.sha1_wcf1' => 'getPasswords_Driver_Sha1Wcf1Service',
            'passwords.driver_collection' => 'getPasswords_DriverCollectionService',
            'passwords.driver_helper' => 'getPasswords_DriverHelperService',
            'passwords.helper' => 'getPasswords_HelperService',
            'passwords.manager' => 'getPasswords_ManagerService',
            'passwords.update.lock' => 'getPasswords_Update_LockService',
            'path_helper' => 'getPathHelperService',
            'php_ini' => 'getPhpIniService',
            'phpbb.feed.controller' => 'getPhpbb_Feed_ControllerService',
            'phpbb.help.controller.bbcode' => 'getPhpbb_Help_Controller_BbcodeService',
            'phpbb.help.controller.faq' => 'getPhpbb_Help_Controller_FaqService',
            'phpbb.help.manager' => 'getPhpbb_Help_ManagerService',
            'phpbb.report.controller' => 'getPhpbb_Report_ControllerService',
            'phpbb.report.handler_factory' => 'getPhpbb_Report_HandlerFactoryService',
            'phpbb.report.handlers.report_handler_pm' => 'getPhpbb_Report_Handlers_ReportHandlerPmService',
            'phpbb.report.handlers.report_handler_post' => 'getPhpbb_Report_Handlers_ReportHandlerPostService',
            'phpbb.report.report_reason_list_provider' => 'getPhpbb_Report_ReportReasonListProviderService',
            'phpbb.viglink.acp_listener' => 'getPhpbb_Viglink_AcpListenerService',
            'phpbb.viglink.cron.task.viglink' => 'getPhpbb_Viglink_Cron_Task_ViglinkService',
            'phpbb.viglink.helper' => 'getPhpbb_Viglink_HelperService',
            'phpbb.viglink.listener' => 'getPhpbb_Viglink_ListenerService',
            'plupload' => 'getPluploadService',
            'profilefields.lang_helper' => 'getProfilefields_LangHelperService',
            'profilefields.manager' => 'getProfilefields_ManagerService',
            'profilefields.type.bool' => 'getProfilefields_Type_BoolService',
            'profilefields.type.date' => 'getProfilefields_Type_DateService',
            'profilefields.type.dropdown' => 'getProfilefields_Type_DropdownService',
            'profilefields.type.googleplus' => 'getProfilefields_Type_GoogleplusService',
            'profilefields.type.int' => 'getProfilefields_Type_IntService',
            'profilefields.type.string' => 'getProfilefields_Type_StringService',
            'profilefields.type.text' => 'getProfilefields_Type_TextService',
            'profilefields.type.url' => 'getProfilefields_Type_UrlService',
            'profilefields.type_collection' => 'getProfilefields_TypeCollectionService',
            'request' => 'getRequestService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'router.listener' => 'getRouter_ListenerService',
            'routing.chained_resources_locator' => 'getRouting_ChainedResourcesLocatorService',
            'routing.delegated_loader' => 'getRouting_DelegatedLoaderService',
            'routing.helper' => 'getRouting_HelperService',
            'routing.loader.collection' => 'getRouting_Loader_CollectionService',
            'routing.loader.yaml' => 'getRouting_Loader_YamlService',
            'routing.resolver' => 'getRouting_ResolverService',
            'routing.resources_locator.collection' => 'getRouting_ResourcesLocator_CollectionService',
            'routing.resources_locator.default' => 'getRouting_ResourcesLocator_DefaultService',
            'symfony_request' => 'getSymfonyRequestService',
            'symfony_response_listener' => 'getSymfonyResponseListenerService',
            'template' => 'getTemplateService',
            'template.twig.environment' => 'getTemplate_Twig_EnvironmentService',
            'template.twig.extensions.collection' => 'getTemplate_Twig_Extensions_CollectionService',
            'template.twig.extensions.debug' => 'getTemplate_Twig_Extensions_DebugService',
            'template.twig.extensions.phpbb' => 'getTemplate_Twig_Extensions_PhpbbService',
            'template.twig.extensions.routing' => 'getTemplate_Twig_Extensions_RoutingService',
            'template.twig.lexer' => 'getTemplate_Twig_LexerService',
            'template.twig.loader' => 'getTemplate_Twig_LoaderService',
            'template_context' => 'getTemplateContextService',
            'text_formatter.data_access' => 'getTextFormatter_DataAccessService',
            'text_formatter.s9e.factory' => 'getTextFormatter_S9e_FactoryService',
            'text_formatter.s9e.link_helper' => 'getTextFormatter_S9e_LinkHelperService',
            'text_formatter.s9e.parser' => 'getTextFormatter_S9e_ParserService',
            'text_formatter.s9e.quote_helper' => 'getTextFormatter_S9e_QuoteHelperService',
            'text_formatter.s9e.renderer' => 'getTextFormatter_S9e_RendererService',
            'text_formatter.s9e.utils' => 'getTextFormatter_S9e_UtilsService',
            'text_reparser.contact_admin_info' => 'getTextReparser_ContactAdminInfoService',
            'text_reparser.forum_description' => 'getTextReparser_ForumDescriptionService',
            'text_reparser.forum_rules' => 'getTextReparser_ForumRulesService',
            'text_reparser.group_description' => 'getTextReparser_GroupDescriptionService',
            'text_reparser.lock' => 'getTextReparser_LockService',
            'text_reparser.manager' => 'getTextReparser_ManagerService',
            'text_reparser.pm_text' => 'getTextReparser_PmTextService',
            'text_reparser.poll_option' => 'getTextReparser_PollOptionService',
            'text_reparser.poll_title' => 'getTextReparser_PollTitleService',
            'text_reparser.post_text' => 'getTextReparser_PostTextService',
            'text_reparser.user_signature' => 'getTextReparser_UserSignatureService',
            'text_reparser_collection' => 'getTextReparserCollectionService',
            'upload_imagesize' => 'getUploadImagesizeService',
            'user' => 'getUserService',
            'user_loader' => 'getUserLoaderService',
            'version_helper' => 'getVersionHelperService',
            'viewonline_helper' => 'getViewonlineHelperService',
        );
        $this->aliases = array(
            'text_formatter.cache' => 'text_formatter.s9e.factory',
            'text_formatter.parser' => 'text_formatter.s9e.parser',
            'text_formatter.renderer' => 'text_formatter.s9e.renderer',
            'text_formatter.utils' => 'text_formatter.s9e.utils',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }

    /**
     * {@inheritdoc}
     */
    public function isFrozen()
    {
        return true;
    }

    /**
     * Gets the 'acl.permissions' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\permissions A phpbb\permissions instance
     */
    protected function getAcl_PermissionsService()
    {
        return $this->services['acl.permissions'] = new \phpbb\permissions($this->get('dispatcher'), $this->get('user'));
    }

    /**
     * Gets the 'attachment.delete' service.
     *
     * @return \phpbb\attachment\delete A phpbb\attachment\delete instance
     */
    protected function getAttachment_DeleteService()
    {
        $a = $this->get('dbal.conn');

        return new \phpbb\attachment\delete($this->get('config'), $a, $this->get('dispatcher'), $this->get('filesystem'), new \phpbb\attachment\resync($a), './');
    }

    /**
     * Gets the 'attachment.manager' service.
     *
     * @return \phpbb\attachment\manager A phpbb\attachment\manager instance
     */
    protected function getAttachment_ManagerService()
    {
        $a = $this->get('dbal.conn');
        $b = $this->get('config');
        $c = $this->get('dispatcher');

        return new \phpbb\attachment\manager(new \phpbb\attachment\delete($b, $a, $c, $this->get('filesystem'), new \phpbb\attachment\resync($a), './'), new \phpbb\attachment\resync($a), new \phpbb\attachment\upload($this->get('auth'), $this->get('cache'), $b, $this->get('files.upload'), $this->get('language'), $this->get('mimetype.guesser'), $c, $this->get('plupload'), $this->get('user'), './'));
    }

    /**
     * Gets the 'attachment.resync' service.
     *
     * @return \phpbb\attachment\resync A phpbb\attachment\resync instance
     */
    protected function getAttachment_ResyncService()
    {
        return new \phpbb\attachment\resync($this->get('dbal.conn'));
    }

    /**
     * Gets the 'attachment.upload' service.
     *
     * @return \phpbb\attachment\upload A phpbb\attachment\upload instance
     */
    protected function getAttachment_UploadService()
    {
        $a = $this->get('language');

        return new \phpbb\attachment\upload($this->get('auth'), $this->get('cache'), $this->get('config'), new \phpbb\files\upload($this->get('filesystem'), $this->get('files.factory'), $a, $this->get('php_ini'), $this->get('request')), $a, $this->get('mimetype.guesser'), $this->get('dispatcher'), $this->get('plupload'), $this->get('user'), './');
    }

    /**
     * Gets the 'auth' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\auth A phpbb\auth\auth instance
     */
    protected function getAuthService()
    {
        return $this->services['auth'] = new \phpbb\auth\auth();
    }

    /**
     * Gets the 'auth.provider.apache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\apache A phpbb\auth\provider\apache instance
     */
    protected function getAuth_Provider_ApacheService()
    {
        return $this->services['auth.provider.apache'] = new \phpbb\auth\provider\apache($this->get('dbal.conn'), $this->get('config'), $this->get('passwords.manager'), $this->get('request'), $this->get('user'), './', 'php');
    }

    /**
     * Gets the 'auth.provider.db' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\db A phpbb\auth\provider\db instance
     */
    protected function getAuth_Provider_DbService()
    {
        return $this->services['auth.provider.db'] = new \phpbb\auth\provider\db($this->get('dbal.conn'), $this->get('config'), $this->get('passwords.manager'), $this->get('request'), $this->get('user'), $this, './', 'php');
    }

    /**
     * Gets the 'auth.provider.ldap' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\ldap A phpbb\auth\provider\ldap instance
     */
    protected function getAuth_Provider_LdapService()
    {
        return $this->services['auth.provider.ldap'] = new \phpbb\auth\provider\ldap($this->get('dbal.conn'), $this->get('config'), $this->get('passwords.manager'), $this->get('user'));
    }

    /**
     * Gets the 'auth.provider.oauth' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\oauth\oauth A phpbb\auth\provider\oauth\oauth instance
     */
    protected function getAuth_Provider_OauthService()
    {
        return $this->services['auth.provider.oauth'] = new \phpbb\auth\provider\oauth\oauth($this->get('dbal.conn'), $this->get('config'), $this->get('passwords.manager'), $this->get('request'), $this->get('user'), 'bb_oauth_tokens', 'bb_oauth_states', 'bb_oauth_accounts', $this->get('auth.provider.oauth.service_collection'), 'bb_users', $this, $this->get('dispatcher'), './', 'php');
    }

    /**
     * Gets the 'auth.provider.oauth.service.bitly' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\oauth\service\bitly A phpbb\auth\provider\oauth\service\bitly instance
     */
    protected function getAuth_Provider_Oauth_Service_BitlyService()
    {
        return $this->services['auth.provider.oauth.service.bitly'] = new \phpbb\auth\provider\oauth\service\bitly($this->get('config'), $this->get('request'));
    }

    /**
     * Gets the 'auth.provider.oauth.service.facebook' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\oauth\service\facebook A phpbb\auth\provider\oauth\service\facebook instance
     */
    protected function getAuth_Provider_Oauth_Service_FacebookService()
    {
        return $this->services['auth.provider.oauth.service.facebook'] = new \phpbb\auth\provider\oauth\service\facebook($this->get('config'), $this->get('request'));
    }

    /**
     * Gets the 'auth.provider.oauth.service.google' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\oauth\service\google A phpbb\auth\provider\oauth\service\google instance
     */
    protected function getAuth_Provider_Oauth_Service_GoogleService()
    {
        return $this->services['auth.provider.oauth.service.google'] = new \phpbb\auth\provider\oauth\service\google($this->get('config'), $this->get('request'));
    }

    /**
     * Gets the 'auth.provider.oauth.service.twitter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider\oauth\service\twitter A phpbb\auth\provider\oauth\service\twitter instance
     */
    protected function getAuth_Provider_Oauth_Service_TwitterService()
    {
        return $this->services['auth.provider.oauth.service.twitter'] = new \phpbb\auth\provider\oauth\service\twitter($this->get('config'), $this->get('request'));
    }

    /**
     * Gets the 'auth.provider.oauth.service_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getAuth_Provider_Oauth_ServiceCollectionService()
    {
        $this->services['auth.provider.oauth.service_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('auth.provider.oauth.service.bitly');
        $instance->add('auth.provider.oauth.service.facebook');
        $instance->add('auth.provider.oauth.service.google');
        $instance->add('auth.provider.oauth.service.twitter');

        return $instance;
    }

    /**
     * Gets the 'auth.provider_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\auth\provider_collection A phpbb\auth\provider_collection instance
     */
    protected function getAuth_ProviderCollectionService()
    {
        $this->services['auth.provider_collection'] = $instance = new \phpbb\auth\provider_collection($this, $this->get('config'));

        $instance->add('auth.provider.db');
        $instance->add('auth.provider.apache');
        $instance->add('auth.provider.ldap');
        $instance->add('auth.provider.oauth');

        return $instance;
    }

    /**
     * Gets the 'avatar.driver.gravatar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\avatar\driver\gravatar A phpbb\avatar\driver\gravatar instance
     */
    protected function getAvatar_Driver_GravatarService()
    {
        $this->services['avatar.driver.gravatar'] = $instance = new \phpbb\avatar\driver\gravatar($this->get('config'), $this->get('upload_imagesize'), './', 'php', $this->get('path_helper'), $this->get('cache.driver'));

        $instance->set_name('avatar.driver.gravatar');

        return $instance;
    }

    /**
     * Gets the 'avatar.driver.local' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\avatar\driver\local A phpbb\avatar\driver\local instance
     */
    protected function getAvatar_Driver_LocalService()
    {
        $this->services['avatar.driver.local'] = $instance = new \phpbb\avatar\driver\local($this->get('config'), $this->get('upload_imagesize'), './', 'php', $this->get('path_helper'), $this->get('cache.driver'));

        $instance->set_name('avatar.driver.local');

        return $instance;
    }

    /**
     * Gets the 'avatar.driver.remote' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\avatar\driver\remote A phpbb\avatar\driver\remote instance
     */
    protected function getAvatar_Driver_RemoteService()
    {
        $this->services['avatar.driver.remote'] = $instance = new \phpbb\avatar\driver\remote($this->get('config'), $this->get('upload_imagesize'), './', 'php', $this->get('path_helper'), $this->get('cache.driver'));

        $instance->set_name('avatar.driver.remote');

        return $instance;
    }

    /**
     * Gets the 'avatar.driver.upload' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\avatar\driver\upload A phpbb\avatar\driver\upload instance
     */
    protected function getAvatar_Driver_UploadService()
    {
        $this->services['avatar.driver.upload'] = $instance = new \phpbb\avatar\driver\upload($this->get('config'), './', 'php', $this->get('filesystem'), $this->get('path_helper'), $this->get('dispatcher'), $this->get('files.factory'), $this->get('cache.driver'));

        $instance->set_name('avatar.driver.upload');

        return $instance;
    }

    /**
     * Gets the 'avatar.driver_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getAvatar_DriverCollectionService()
    {
        $this->services['avatar.driver_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('avatar.driver.gravatar');
        $instance->add('avatar.driver.local');
        $instance->add('avatar.driver.remote');
        $instance->add('avatar.driver.upload');

        return $instance;
    }

    /**
     * Gets the 'avatar.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\avatar\manager A phpbb\avatar\manager instance
     */
    protected function getAvatar_ManagerService()
    {
        return $this->services['avatar.manager'] = new \phpbb\avatar\manager($this->get('config'), $this->get('avatar.driver_collection'));
    }

    /**
     * Gets the 'cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cache\service A phpbb\cache\service instance
     */
    protected function getCacheService()
    {
        return $this->services['cache'] = new \phpbb\cache\service($this->get('cache.driver'), $this->get('config'), $this->get('dbal.conn'), './', 'php');
    }

    /**
     * Gets the 'cache.driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cache\driver\file A phpbb\cache\driver\file instance
     */
    protected function getCache_DriverService()
    {
        return $this->services['cache.driver'] = new \phpbb\cache\driver\file();
    }

    /**
     * Gets the 'captcha.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\captcha\factory A phpbb\captcha\factory instance
     */
    protected function getCaptcha_FactoryService()
    {
        return $this->services['captcha.factory'] = new \phpbb\captcha\factory($this, $this->get('captcha.plugins.service_collection'));
    }

    /**
     * Gets the 'captcha.plugins.service_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getCaptcha_Plugins_ServiceCollectionService()
    {
        $this->services['captcha.plugins.service_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('core.captcha.plugins.gd');
        $instance->add('core.captcha.plugins.gd_wave');
        $instance->add('core.captcha.plugins.nogd');
        $instance->add('core.captcha.plugins.qa');
        $instance->add('core.captcha.plugins.recaptcha');

        return $instance;
    }

    /**
     * Gets the 'class_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\class_loader A phpbb\class_loader instance
     */
    protected function getClassLoaderService()
    {
        $this->services['class_loader'] = $instance = new \phpbb\class_loader('phpbb\\', './includes/', 'php');

        $instance->register();
        $instance->set_cache($this->get('cache.driver'));

        return $instance;
    }

    /**
     * Gets the 'class_loader.ext' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\class_loader A phpbb\class_loader instance
     */
    protected function getClassLoader_ExtService()
    {
        $this->services['class_loader.ext'] = $instance = new \phpbb\class_loader('\\', './ext/', 'php');

        $instance->register();
        $instance->set_cache($this->get('cache.driver'));

        return $instance;
    }

    /**
     * Gets the 'config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\config\db A phpbb\config\db instance
     */
    protected function getConfigService()
    {
        return $this->services['config'] = new \phpbb\config\db($this->get('dbal.conn'), $this->get('cache.driver'), 'bb_config');
    }

    /**
     * Gets the 'config.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getConfig_PhpService()
    {
        throw new RuntimeException('You have requested a synthetic service ("config.php"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'config_text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\config\db_text A phpbb\config\db_text instance
     */
    protected function getConfigTextService()
    {
        return $this->services['config_text'] = new \phpbb\config\db_text($this->get('dbal.conn'), 'bb_config_text');
    }

    /**
     * Gets the 'console.command.cache.purge' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\cache\purge A phpbb\console\command\cache\purge instance
     */
    protected function getConsole_Command_Cache_PurgeService()
    {
        return $this->services['console.command.cache.purge'] = new \phpbb\console\command\cache\purge($this->get('user'), $this->get('cache.driver'), $this->get('dbal.conn'), $this->get('auth'), $this->get('log'), $this->get('config'));
    }

    /**
     * Gets the 'console.command.config.delete' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\config\delete A phpbb\console\command\config\delete instance
     */
    protected function getConsole_Command_Config_DeleteService()
    {
        return $this->services['console.command.config.delete'] = new \phpbb\console\command\config\delete($this->get('user'), $this->get('config'));
    }

    /**
     * Gets the 'console.command.config.get' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\config\get A phpbb\console\command\config\get instance
     */
    protected function getConsole_Command_Config_GetService()
    {
        return $this->services['console.command.config.get'] = new \phpbb\console\command\config\get($this->get('user'), $this->get('config'));
    }

    /**
     * Gets the 'console.command.config.increment' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\config\increment A phpbb\console\command\config\increment instance
     */
    protected function getConsole_Command_Config_IncrementService()
    {
        return $this->services['console.command.config.increment'] = new \phpbb\console\command\config\increment($this->get('user'), $this->get('config'));
    }

    /**
     * Gets the 'console.command.config.set' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\config\set A phpbb\console\command\config\set instance
     */
    protected function getConsole_Command_Config_SetService()
    {
        return $this->services['console.command.config.set'] = new \phpbb\console\command\config\set($this->get('user'), $this->get('config'));
    }

    /**
     * Gets the 'console.command.config.set_atomic' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\config\set_atomic A phpbb\console\command\config\set_atomic instance
     */
    protected function getConsole_Command_Config_SetAtomicService()
    {
        return $this->services['console.command.config.set_atomic'] = new \phpbb\console\command\config\set_atomic($this->get('user'), $this->get('config'));
    }

    /**
     * Gets the 'console.command.cron.list' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\cron\cron_list A phpbb\console\command\cron\cron_list instance
     */
    protected function getConsole_Command_Cron_ListService()
    {
        return $this->services['console.command.cron.list'] = new \phpbb\console\command\cron\cron_list($this->get('user'), $this->get('cron.manager'));
    }

    /**
     * Gets the 'console.command.cron.run' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\cron\run A phpbb\console\command\cron\run instance
     */
    protected function getConsole_Command_Cron_RunService()
    {
        return $this->services['console.command.cron.run'] = new \phpbb\console\command\cron\run($this->get('user'), $this->get('cron.manager'), $this->get('cron.lock_db'));
    }

    /**
     * Gets the 'console.command.db.list' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\db\list_command A phpbb\console\command\db\list_command instance
     */
    protected function getConsole_Command_Db_ListService()
    {
        return $this->services['console.command.db.list'] = new \phpbb\console\command\db\list_command($this->get('user'), $this->get('migrator'), $this->get('ext.manager'), $this->get('config'), $this->get('cache'));
    }

    /**
     * Gets the 'console.command.db.migrate' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\db\migrate A phpbb\console\command\db\migrate instance
     */
    protected function getConsole_Command_Db_MigrateService()
    {
        return $this->services['console.command.db.migrate'] = new \phpbb\console\command\db\migrate($this->get('user'), $this->get('language'), $this->get('migrator'), $this->get('ext.manager'), $this->get('config'), $this->get('cache'), $this->get('log'), $this->get('filesystem'), './');
    }

    /**
     * Gets the 'console.command.db.revert' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\db\revert A phpbb\console\command\db\revert instance
     */
    protected function getConsole_Command_Db_RevertService()
    {
        return $this->services['console.command.db.revert'] = new \phpbb\console\command\db\revert($this->get('user'), $this->get('language'), $this->get('migrator'), $this->get('ext.manager'), $this->get('config'), $this->get('cache'), $this->get('log'), $this->get('filesystem'), './');
    }

    /**
     * Gets the 'console.command.dev.migration_tips' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\dev\migration_tips A phpbb\console\command\dev\migration_tips instance
     */
    protected function getConsole_Command_Dev_MigrationTipsService()
    {
        return $this->services['console.command.dev.migration_tips'] = new \phpbb\console\command\dev\migration_tips($this->get('user'), $this->get('ext.manager'));
    }

    /**
     * Gets the 'console.command.extension.disable' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\extension\disable A phpbb\console\command\extension\disable instance
     */
    protected function getConsole_Command_Extension_DisableService()
    {
        return $this->services['console.command.extension.disable'] = new \phpbb\console\command\extension\disable($this->get('user'), $this->get('ext.manager'), $this->get('log'));
    }

    /**
     * Gets the 'console.command.extension.enable' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\extension\enable A phpbb\console\command\extension\enable instance
     */
    protected function getConsole_Command_Extension_EnableService()
    {
        return $this->services['console.command.extension.enable'] = new \phpbb\console\command\extension\enable($this->get('user'), $this->get('ext.manager'), $this->get('log'));
    }

    /**
     * Gets the 'console.command.extension.purge' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\extension\purge A phpbb\console\command\extension\purge instance
     */
    protected function getConsole_Command_Extension_PurgeService()
    {
        return $this->services['console.command.extension.purge'] = new \phpbb\console\command\extension\purge($this->get('user'), $this->get('ext.manager'), $this->get('log'));
    }

    /**
     * Gets the 'console.command.extension.show' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\extension\show A phpbb\console\command\extension\show instance
     */
    protected function getConsole_Command_Extension_ShowService()
    {
        return $this->services['console.command.extension.show'] = new \phpbb\console\command\extension\show($this->get('user'), $this->get('ext.manager'), $this->get('log'));
    }

    /**
     * Gets the 'console.command.fixup.fix_left_right_ids' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\fixup\fix_left_right_ids A phpbb\console\command\fixup\fix_left_right_ids instance
     */
    protected function getConsole_Command_Fixup_FixLeftRightIdsService()
    {
        return $this->services['console.command.fixup.fix_left_right_ids'] = new \phpbb\console\command\fixup\fix_left_right_ids($this->get('user'), $this->get('dbal.conn'), $this->get('cache.driver'));
    }

    /**
     * Gets the 'console.command.fixup.recalculate_email_hash' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\fixup\recalculate_email_hash A phpbb\console\command\fixup\recalculate_email_hash instance
     */
    protected function getConsole_Command_Fixup_RecalculateEmailHashService()
    {
        return $this->services['console.command.fixup.recalculate_email_hash'] = new \phpbb\console\command\fixup\recalculate_email_hash($this->get('user'), $this->get('dbal.conn'));
    }

    /**
     * Gets the 'console.command.fixup.update_hashes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\fixup\update_hashes A phpbb\console\command\fixup\update_hashes instance
     */
    protected function getConsole_Command_Fixup_UpdateHashesService()
    {
        return $this->services['console.command.fixup.update_hashes'] = new \phpbb\console\command\fixup\update_hashes($this->get('config'), $this->get('user'), $this->get('dbal.conn'), $this->get('passwords.manager'), $this->get('passwords.driver_collection'), array(0 => 'passwords.driver.bcrypt_2y', 1 => 'passwords.driver.bcrypt', 2 => 'passwords.driver.salted_md5', 3 => 'passwords.driver.phpass'));
    }

    /**
     * Gets the 'console.command.reparser.list' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\reparser\list_all A phpbb\console\command\reparser\list_all instance
     */
    protected function getConsole_Command_Reparser_ListService()
    {
        return $this->services['console.command.reparser.list'] = new \phpbb\console\command\reparser\list_all($this->get('user'), $this->get('text_reparser_collection'));
    }

    /**
     * Gets the 'console.command.reparser.reparse' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\reparser\reparse A phpbb\console\command\reparser\reparse instance
     */
    protected function getConsole_Command_Reparser_ReparseService()
    {
        return $this->services['console.command.reparser.reparse'] = new \phpbb\console\command\reparser\reparse($this->get('user'), $this->get('text_reparser.lock'), $this->get('text_reparser.manager'), $this->get('text_reparser_collection'));
    }

    /**
     * Gets the 'console.command.thumbnail.delete' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\thumbnail\delete A phpbb\console\command\thumbnail\delete instance
     */
    protected function getConsole_Command_Thumbnail_DeleteService()
    {
        return $this->services['console.command.thumbnail.delete'] = new \phpbb\console\command\thumbnail\delete($this->get('user'), $this->get('dbal.conn'), './');
    }

    /**
     * Gets the 'console.command.thumbnail.generate' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\thumbnail\generate A phpbb\console\command\thumbnail\generate instance
     */
    protected function getConsole_Command_Thumbnail_GenerateService()
    {
        return $this->services['console.command.thumbnail.generate'] = new \phpbb\console\command\thumbnail\generate($this->get('user'), $this->get('dbal.conn'), $this->get('cache'), './', 'php');
    }

    /**
     * Gets the 'console.command.thumbnail.recreate' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\thumbnail\recreate A phpbb\console\command\thumbnail\recreate instance
     */
    protected function getConsole_Command_Thumbnail_RecreateService()
    {
        return $this->services['console.command.thumbnail.recreate'] = new \phpbb\console\command\thumbnail\recreate($this->get('user'));
    }

    /**
     * Gets the 'console.command.update.check' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\update\check A phpbb\console\command\update\check instance
     */
    protected function getConsole_Command_Update_CheckService()
    {
        return $this->services['console.command.update.check'] = new \phpbb\console\command\update\check($this->get('user'), $this->get('config'), $this, $this->get('language'));
    }

    /**
     * Gets the 'console.command.user.activate' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\user\activate A phpbb\console\command\user\activate instance
     */
    protected function getConsole_Command_User_ActivateService()
    {
        return $this->services['console.command.user.activate'] = new \phpbb\console\command\user\activate($this->get('user'), $this->get('dbal.conn'), $this->get('config'), $this->get('language'), $this->get('log'), $this->get('notification_manager'), $this->get('user_loader'), './', 'php');
    }

    /**
     * Gets the 'console.command.user.add' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\user\add A phpbb\console\command\user\add instance
     */
    protected function getConsole_Command_User_AddService()
    {
        return $this->services['console.command.user.add'] = new \phpbb\console\command\user\add($this->get('user'), $this->get('dbal.conn'), $this->get('config'), $this->get('language'), $this->get('passwords.manager'), './', 'php');
    }

    /**
     * Gets the 'console.command.user.delete' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\user\delete A phpbb\console\command\user\delete instance
     */
    protected function getConsole_Command_User_DeleteService()
    {
        return $this->services['console.command.user.delete'] = new \phpbb\console\command\user\delete($this->get('user'), $this->get('dbal.conn'), $this->get('language'), $this->get('log'), $this->get('user_loader'), './', 'php');
    }

    /**
     * Gets the 'console.command.user.reclean' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\command\user\reclean A phpbb\console\command\user\reclean instance
     */
    protected function getConsole_Command_User_RecleanService()
    {
        return $this->services['console.command.user.reclean'] = new \phpbb\console\command\user\reclean($this->get('user'), $this->get('dbal.conn'), $this->get('language'));
    }

    /**
     * Gets the 'console.command_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getConsole_CommandCollectionService()
    {
        $this->services['console.command_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('console.command.cache.purge');
        $instance->add('console.command.config.delete');
        $instance->add('console.command.config.increment');
        $instance->add('console.command.config.get');
        $instance->add('console.command.config.set');
        $instance->add('console.command.config.set_atomic');
        $instance->add('console.command.cron.list');
        $instance->add('console.command.cron.run');
        $instance->add('console.command.db.list');
        $instance->add('console.command.db.migrate');
        $instance->add('console.command.db.revert');
        $instance->add('console.command.dev.migration_tips');
        $instance->add('console.command.extension.disable');
        $instance->add('console.command.extension.enable');
        $instance->add('console.command.extension.purge');
        $instance->add('console.command.extension.show');
        $instance->add('console.command.fixup.recalculate_email_hash');
        $instance->add('console.command.fixup.update_hashes');
        $instance->add('console.command.fixup.fix_left_right_ids');
        $instance->add('console.command.reparser.list');
        $instance->add('console.command.reparser.reparse');
        $instance->add('console.command.thumbnail.delete');
        $instance->add('console.command.thumbnail.generate');
        $instance->add('console.command.thumbnail.recreate');
        $instance->add('console.command.update.check');
        $instance->add('console.command.user.activate');
        $instance->add('console.command.user.add');
        $instance->add('console.command.user.delete');
        $instance->add('console.command.user.reclean');

        return $instance;
    }

    /**
     * Gets the 'console.exception_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\console\exception_subscriber A phpbb\console\exception_subscriber instance
     */
    protected function getConsole_ExceptionSubscriberService()
    {
        return $this->services['console.exception_subscriber'] = new \phpbb\console\exception_subscriber($this->get('language'), false);
    }

    /**
     * Gets the 'content.visibility' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\content_visibility A phpbb\content_visibility instance
     */
    protected function getContent_VisibilityService()
    {
        return $this->services['content.visibility'] = new \phpbb\content_visibility($this->get('auth'), $this->get('config'), $this->get('dispatcher'), $this->get('dbal.conn'), $this->get('user'), './', 'php', 'bb_forums', 'bb_posts', 'bb_topics', 'bb_users');
    }

    /**
     * Gets the 'controller.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\controller\helper A phpbb\controller\helper instance
     */
    protected function getController_HelperService()
    {
        return $this->services['controller.helper'] = new \phpbb\controller\helper($this->get('template'), $this->get('user'), $this->get('config'), $this->get('symfony_request'), $this->get('request'), $this->get('routing.helper'));
    }

    /**
     * Gets the 'controller.resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\controller\resolver A phpbb\controller\resolver instance
     */
    protected function getController_ResolverService()
    {
        return $this->services['controller.resolver'] = new \phpbb\controller\resolver($this, './', $this->get('template'));
    }

    /**
     * Gets the 'core.captcha.plugins.gd' service.
     *
     * @return \phpbb\captcha\plugins\gd A phpbb\captcha\plugins\gd instance
     */
    protected function getCore_Captcha_Plugins_GdService()
    {
        $instance = new \phpbb\captcha\plugins\gd();

        $instance->set_name('core.captcha.plugins.gd');

        return $instance;
    }

    /**
     * Gets the 'core.captcha.plugins.gd_wave' service.
     *
     * @return \phpbb\captcha\plugins\gd_wave A phpbb\captcha\plugins\gd_wave instance
     */
    protected function getCore_Captcha_Plugins_GdWaveService()
    {
        $instance = new \phpbb\captcha\plugins\gd_wave();

        $instance->set_name('core.captcha.plugins.gd_wave');

        return $instance;
    }

    /**
     * Gets the 'core.captcha.plugins.nogd' service.
     *
     * @return \phpbb\captcha\plugins\nogd A phpbb\captcha\plugins\nogd instance
     */
    protected function getCore_Captcha_Plugins_NogdService()
    {
        $instance = new \phpbb\captcha\plugins\nogd();

        $instance->set_name('core.captcha.plugins.nogd');

        return $instance;
    }

    /**
     * Gets the 'core.captcha.plugins.qa' service.
     *
     * @return \phpbb\captcha\plugins\qa A phpbb\captcha\plugins\qa instance
     */
    protected function getCore_Captcha_Plugins_QaService()
    {
        $instance = new \phpbb\captcha\plugins\qa('bb_captcha_questions', 'bb_captcha_answers', 'bb_qa_confirm');

        $instance->set_name('core.captcha.plugins.qa');

        return $instance;
    }

    /**
     * Gets the 'core.captcha.plugins.recaptcha' service.
     *
     * @return \phpbb\captcha\plugins\recaptcha A phpbb\captcha\plugins\recaptcha instance
     */
    protected function getCore_Captcha_Plugins_RecaptchaService()
    {
        $instance = new \phpbb\captcha\plugins\recaptcha();

        $instance->set_name('core.captcha.plugins.recaptcha');

        return $instance;
    }

    /**
     * Gets the 'cron.lock_db' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\lock\db A phpbb\lock\db instance
     */
    protected function getCron_LockDbService()
    {
        return $this->services['cron.lock_db'] = new \phpbb\lock\db('cron_lock', $this->get('config'), $this->get('dbal.conn'));
    }

    /**
     * Gets the 'cron.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\manager A phpbb\cron\manager instance
     */
    protected function getCron_ManagerService()
    {
        return $this->services['cron.manager'] = new \phpbb\cron\manager($this->get('cron.task_collection'), './', 'php');
    }

    /**
     * Gets the 'cron.task.core.prune_all_forums' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\prune_all_forums A phpbb\cron\task\core\prune_all_forums instance
     */
    protected function getCron_Task_Core_PruneAllForumsService()
    {
        $this->services['cron.task.core.prune_all_forums'] = $instance = new \phpbb\cron\task\core\prune_all_forums('./', 'php', $this->get('config'), $this->get('dbal.conn'));

        $instance->set_name('cron.task.core.prune_all_forums');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.prune_forum' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\prune_forum A phpbb\cron\task\core\prune_forum instance
     */
    protected function getCron_Task_Core_PruneForumService()
    {
        $this->services['cron.task.core.prune_forum'] = $instance = new \phpbb\cron\task\core\prune_forum('./', 'php', $this->get('config'), $this->get('dbal.conn'));

        $instance->set_name('cron.task.core.prune_forum');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.prune_notifications' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\prune_notifications A phpbb\cron\task\core\prune_notifications instance
     */
    protected function getCron_Task_Core_PruneNotificationsService()
    {
        $this->services['cron.task.core.prune_notifications'] = $instance = new \phpbb\cron\task\core\prune_notifications($this->get('config'), $this->get('notification_manager'));

        $instance->set_name('cron.task.core.prune_notifications');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.prune_shadow_topics' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\prune_shadow_topics A phpbb\cron\task\core\prune_shadow_topics instance
     */
    protected function getCron_Task_Core_PruneShadowTopicsService()
    {
        $this->services['cron.task.core.prune_shadow_topics'] = $instance = new \phpbb\cron\task\core\prune_shadow_topics('./', 'php', $this->get('config'), $this->get('dbal.conn'), $this->get('log'), $this->get('user'));

        $instance->set_name('cron.task.core.prune_shadow_topics');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.queue' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\queue A phpbb\cron\task\core\queue instance
     */
    protected function getCron_Task_Core_QueueService()
    {
        $this->services['cron.task.core.queue'] = $instance = new \phpbb\cron\task\core\queue('./', 'php', $this->get('config'), './cache/production/');

        $instance->set_name('cron.task.core.queue');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.tidy_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\tidy_cache A phpbb\cron\task\core\tidy_cache instance
     */
    protected function getCron_Task_Core_TidyCacheService()
    {
        $this->services['cron.task.core.tidy_cache'] = $instance = new \phpbb\cron\task\core\tidy_cache($this->get('config'), $this->get('cache.driver'));

        $instance->set_name('cron.task.core.tidy_cache');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.tidy_database' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\tidy_database A phpbb\cron\task\core\tidy_database instance
     */
    protected function getCron_Task_Core_TidyDatabaseService()
    {
        $this->services['cron.task.core.tidy_database'] = $instance = new \phpbb\cron\task\core\tidy_database('./', 'php', $this->get('config'));

        $instance->set_name('cron.task.core.tidy_database');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.tidy_plupload' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\tidy_plupload A phpbb\cron\task\core\tidy_plupload instance
     */
    protected function getCron_Task_Core_TidyPluploadService()
    {
        $this->services['cron.task.core.tidy_plupload'] = $instance = new \phpbb\cron\task\core\tidy_plupload('./', $this->get('config'), $this->get('log'), $this->get('user'));

        $instance->set_name('cron.task.core.tidy_plupload');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.tidy_search' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\tidy_search A phpbb\cron\task\core\tidy_search instance
     */
    protected function getCron_Task_Core_TidySearchService()
    {
        $this->services['cron.task.core.tidy_search'] = $instance = new \phpbb\cron\task\core\tidy_search('./', 'php', $this->get('auth'), $this->get('config'), $this->get('dbal.conn'), $this->get('user'), $this->get('dispatcher'));

        $instance->set_name('cron.task.core.tidy_search');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.tidy_sessions' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\tidy_sessions A phpbb\cron\task\core\tidy_sessions instance
     */
    protected function getCron_Task_Core_TidySessionsService()
    {
        $this->services['cron.task.core.tidy_sessions'] = $instance = new \phpbb\cron\task\core\tidy_sessions($this->get('config'), $this->get('user'));

        $instance->set_name('cron.task.core.tidy_sessions');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.tidy_warnings' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\tidy_warnings A phpbb\cron\task\core\tidy_warnings instance
     */
    protected function getCron_Task_Core_TidyWarningsService()
    {
        $this->services['cron.task.core.tidy_warnings'] = $instance = new \phpbb\cron\task\core\tidy_warnings('./', 'php', $this->get('config'));

        $instance->set_name('cron.task.core.tidy_warnings');

        return $instance;
    }

    /**
     * Gets the 'cron.task.core.update_hashes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\core\update_hashes A phpbb\cron\task\core\update_hashes instance
     */
    protected function getCron_Task_Core_UpdateHashesService()
    {
        $this->services['cron.task.core.update_hashes'] = $instance = new \phpbb\cron\task\core\update_hashes($this->get('config'), $this->get('dbal.conn'), $this->get('passwords.update.lock'), $this->get('passwords.manager'), $this->get('passwords.driver_collection'), array(0 => 'passwords.driver.bcrypt_2y', 1 => 'passwords.driver.bcrypt', 2 => 'passwords.driver.salted_md5', 3 => 'passwords.driver.phpass'));

        $instance->set_name('cron.task.core.update_hashes');

        return $instance;
    }

    /**
     * Gets the 'cron.task.text_reparser.pm_text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\text_reparser\reparser A phpbb\cron\task\text_reparser\reparser instance
     */
    protected function getCron_Task_TextReparser_PmTextService()
    {
        $this->services['cron.task.text_reparser.pm_text'] = $instance = new \phpbb\cron\task\text_reparser\reparser($this->get('config'), $this->get('config_text'), $this->get('text_reparser.lock'), $this->get('text_reparser.manager'), $this->get('text_reparser_collection'));

        $instance->set_name('cron.task.text_reparser.pm_text');
        $instance->set_reparser('text_reparser.pm_text');

        return $instance;
    }

    /**
     * Gets the 'cron.task.text_reparser.poll_option' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\text_reparser\reparser A phpbb\cron\task\text_reparser\reparser instance
     */
    protected function getCron_Task_TextReparser_PollOptionService()
    {
        $this->services['cron.task.text_reparser.poll_option'] = $instance = new \phpbb\cron\task\text_reparser\reparser($this->get('config'), $this->get('config_text'), $this->get('text_reparser.lock'), $this->get('text_reparser.manager'), $this->get('text_reparser_collection'));

        $instance->set_name('cron.task.text_reparser.poll_option');
        $instance->set_reparser('text_reparser.poll_option');

        return $instance;
    }

    /**
     * Gets the 'cron.task.text_reparser.poll_title' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\text_reparser\reparser A phpbb\cron\task\text_reparser\reparser instance
     */
    protected function getCron_Task_TextReparser_PollTitleService()
    {
        $this->services['cron.task.text_reparser.poll_title'] = $instance = new \phpbb\cron\task\text_reparser\reparser($this->get('config'), $this->get('config_text'), $this->get('text_reparser.lock'), $this->get('text_reparser.manager'), $this->get('text_reparser_collection'));

        $instance->set_name('cron.task.text_reparser.poll_title');
        $instance->set_reparser('text_reparser.poll_title');

        return $instance;
    }

    /**
     * Gets the 'cron.task.text_reparser.post_text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\text_reparser\reparser A phpbb\cron\task\text_reparser\reparser instance
     */
    protected function getCron_Task_TextReparser_PostTextService()
    {
        $this->services['cron.task.text_reparser.post_text'] = $instance = new \phpbb\cron\task\text_reparser\reparser($this->get('config'), $this->get('config_text'), $this->get('text_reparser.lock'), $this->get('text_reparser.manager'), $this->get('text_reparser_collection'));

        $instance->set_name('cron.task.text_reparser.post_text');
        $instance->set_reparser('text_reparser.post_text');

        return $instance;
    }

    /**
     * Gets the 'cron.task.text_reparser.user_signature' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\cron\task\text_reparser\reparser A phpbb\cron\task\text_reparser\reparser instance
     */
    protected function getCron_Task_TextReparser_UserSignatureService()
    {
        $this->services['cron.task.text_reparser.user_signature'] = $instance = new \phpbb\cron\task\text_reparser\reparser($this->get('config'), $this->get('config_text'), $this->get('text_reparser.lock'), $this->get('text_reparser.manager'), $this->get('text_reparser_collection'));

        $instance->set_name('cron.task.text_reparser.user_signature');
        $instance->set_reparser('text_reparser.user_signature');

        return $instance;
    }

    /**
     * Gets the 'cron.task_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getCron_TaskCollectionService()
    {
        $this->services['cron.task_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('cron.task.core.prune_all_forums');
        $instance->add('cron.task.core.prune_forum');
        $instance->add('cron.task.core.prune_shadow_topics');
        $instance->add('cron.task.core.prune_notifications');
        $instance->add('cron.task.core.queue');
        $instance->add('cron.task.core.tidy_cache');
        $instance->add('cron.task.core.tidy_database');
        $instance->add('cron.task.core.tidy_plupload');
        $instance->add('cron.task.core.tidy_search');
        $instance->add('cron.task.core.tidy_sessions');
        $instance->add('cron.task.core.tidy_warnings');
        $instance->add('cron.task.text_reparser.pm_text');
        $instance->add('cron.task.text_reparser.poll_option');
        $instance->add('cron.task.text_reparser.poll_title');
        $instance->add('cron.task.text_reparser.post_text');
        $instance->add('cron.task.text_reparser.user_signature');
        $instance->add('cron.task.core.update_hashes');
        $instance->add('phpbb.viglink.cron.task.viglink');

        return $instance;
    }

    /**
     * Gets the 'dbal.conn' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\driver\factory A phpbb\db\driver\factory instance
     */
    protected function getDbal_ConnService()
    {
        return $this->services['dbal.conn'] = new \phpbb\db\driver\factory($this);
    }

    /**
     * Gets the 'dbal.conn.driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getDbal_Conn_DriverService()
    {
        throw new RuntimeException('You have requested a synthetic service ("dbal.conn.driver"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'dbal.extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\extractor\extractor_interface A phpbb\db\extractor\extractor_interface instance
     */
    protected function getDbal_ExtractorService()
    {
        return $this->services['dbal.extractor'] = $this->get('dbal.extractor.factory')->get();
    }

    /**
     * Gets the 'dbal.extractor.extractors.mssql_extractor' service.
     *
     * @return \phpbb\db\extractor\mssql_extractor A phpbb\db\extractor\mssql_extractor instance
     */
    protected function getDbal_Extractor_Extractors_MssqlExtractorService()
    {
        return new \phpbb\db\extractor\mssql_extractor('./', $this->get('request'), $this->get('dbal.conn.driver'));
    }

    /**
     * Gets the 'dbal.extractor.extractors.mysql_extractor' service.
     *
     * @return \phpbb\db\extractor\mysql_extractor A phpbb\db\extractor\mysql_extractor instance
     */
    protected function getDbal_Extractor_Extractors_MysqlExtractorService()
    {
        return new \phpbb\db\extractor\mysql_extractor('./', $this->get('request'), $this->get('dbal.conn.driver'));
    }

    /**
     * Gets the 'dbal.extractor.extractors.oracle_extractor' service.
     *
     * @return \phpbb\db\extractor\oracle_extractor A phpbb\db\extractor\oracle_extractor instance
     */
    protected function getDbal_Extractor_Extractors_OracleExtractorService()
    {
        return new \phpbb\db\extractor\oracle_extractor('./', $this->get('request'), $this->get('dbal.conn.driver'));
    }

    /**
     * Gets the 'dbal.extractor.extractors.postgres_extractor' service.
     *
     * @return \phpbb\db\extractor\postgres_extractor A phpbb\db\extractor\postgres_extractor instance
     */
    protected function getDbal_Extractor_Extractors_PostgresExtractorService()
    {
        return new \phpbb\db\extractor\postgres_extractor('./', $this->get('request'), $this->get('dbal.conn.driver'));
    }

    /**
     * Gets the 'dbal.extractor.extractors.sqlite3_extractor' service.
     *
     * @return \phpbb\db\extractor\sqlite3_extractor A phpbb\db\extractor\sqlite3_extractor instance
     */
    protected function getDbal_Extractor_Extractors_Sqlite3ExtractorService()
    {
        return new \phpbb\db\extractor\sqlite3_extractor('./', $this->get('request'), $this->get('dbal.conn.driver'));
    }

    /**
     * Gets the 'dbal.extractor.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\extractor\factory A phpbb\db\extractor\factory instance
     */
    protected function getDbal_Extractor_FactoryService()
    {
        return $this->services['dbal.extractor.factory'] = new \phpbb\db\extractor\factory($this->get('dbal.conn.driver'), $this);
    }

    /**
     * Gets the 'dbal.tools' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\tools\tools_interface A phpbb\db\tools\tools_interface instance
     */
    protected function getDbal_ToolsService()
    {
        return $this->services['dbal.tools'] = $this->get('dbal.tools.factory')->get($this->get('dbal.conn.driver'));
    }

    /**
     * Gets the 'dbal.tools.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\tools\factory A phpbb\db\tools\factory instance
     */
    protected function getDbal_Tools_FactoryService()
    {
        return $this->services['dbal.tools.factory'] = new \phpbb\db\tools\factory();
    }

    /**
     * Gets the 'dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\event\dispatcher A phpbb\event\dispatcher instance
     */
    protected function getDispatcherService()
    {
        $this->services['dispatcher'] = $instance = new \phpbb\event\dispatcher($this);

        $instance->addSubscriberService('phpbb.viglink.listener', 'phpbb\\viglink\\event\\listener');
        $instance->addSubscriberService('phpbb.viglink.acp_listener', 'phpbb\\viglink\\event\\acp_listener');
        $instance->addSubscriberService('console.exception_subscriber', 'phpbb\\console\\exception_subscriber');
        $instance->addSubscriberService('kernel_exception_subscriber', 'phpbb\\event\\kernel_exception_subscriber');
        $instance->addSubscriberService('kernel_terminate_subscriber', 'phpbb\\event\\kernel_terminate_subscriber');
        $instance->addSubscriberService('symfony_response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener');
        $instance->addSubscriberService('router.listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');

        return $instance;
    }

    /**
     * Gets the 'ext.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\extension\manager A phpbb\extension\manager instance
     */
    protected function getExt_ManagerService()
    {
        return $this->services['ext.manager'] = new \phpbb\extension\manager($this, $this->get('dbal.conn'), $this->get('config'), $this->get('filesystem'), 'bb_ext', './', 'php', $this->get('cache'));
    }

    /**
     * Gets the 'feed.forum' service.
     *
     * @return \phpbb\feed\forum A phpbb\feed\forum instance
     */
    protected function getFeed_ForumService()
    {
        return new \phpbb\feed\forum($this->get('feed.helper'), $this->get('config'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('auth'), $this->get('content.visibility'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'feed.forums' service.
     *
     * @return \phpbb\feed\forums A phpbb\feed\forums instance
     */
    protected function getFeed_ForumsService()
    {
        return new \phpbb\feed\forums($this->get('feed.helper'), $this->get('config'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('auth'), $this->get('content.visibility'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'feed.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\feed\helper A phpbb\feed\helper instance
     */
    protected function getFeed_HelperService()
    {
        return $this->services['feed.helper'] = new \phpbb\feed\helper($this->get('config'), $this->get('user'), './', 'php');
    }

    /**
     * Gets the 'feed.news' service.
     *
     * @return \phpbb\feed\news A phpbb\feed\news instance
     */
    protected function getFeed_NewsService()
    {
        return new \phpbb\feed\news($this->get('feed.helper'), $this->get('config'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('auth'), $this->get('content.visibility'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'feed.overall' service.
     *
     * @return \phpbb\feed\overall A phpbb\feed\overall instance
     */
    protected function getFeed_OverallService()
    {
        return new \phpbb\feed\overall($this->get('feed.helper'), $this->get('config'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('auth'), $this->get('content.visibility'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'feed.topic' service.
     *
     * @return \phpbb\feed\topic A phpbb\feed\topic instance
     */
    protected function getFeed_TopicService()
    {
        return new \phpbb\feed\topic($this->get('feed.helper'), $this->get('config'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('auth'), $this->get('content.visibility'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'feed.topics' service.
     *
     * @return \phpbb\feed\topics A phpbb\feed\topics instance
     */
    protected function getFeed_TopicsService()
    {
        return new \phpbb\feed\topics($this->get('feed.helper'), $this->get('config'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('auth'), $this->get('content.visibility'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'feed.topics_active' service.
     *
     * @return \phpbb\feed\topics_active A phpbb\feed\topics_active instance
     */
    protected function getFeed_TopicsActiveService()
    {
        return new \phpbb\feed\topics_active($this->get('feed.helper'), $this->get('config'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('auth'), $this->get('content.visibility'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'file_downloader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\file_downloader A phpbb\file_downloader instance
     */
    protected function getFileDownloaderService()
    {
        return $this->services['file_downloader'] = new \phpbb\file_downloader();
    }

    /**
     * Gets the 'file_locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\routing\file_locator A phpbb\routing\file_locator instance
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \phpbb\routing\file_locator($this->get('filesystem'), './');
    }

    /**
     * Gets the 'files.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\files\factory A phpbb\files\factory instance
     */
    protected function getFiles_FactoryService()
    {
        return $this->services['files.factory'] = new \phpbb\files\factory($this);
    }

    /**
     * Gets the 'files.filespec' service.
     *
     * @return \phpbb\files\filespec A phpbb\files\filespec instance
     */
    protected function getFiles_FilespecService()
    {
        return new \phpbb\files\filespec($this->get('filesystem'), $this->get('language'), $this->get('php_ini'), $this->get('upload_imagesize'), './', $this->get('mimetype.guesser'), $this->get('plupload'));
    }

    /**
     * Gets the 'files.types.form' service.
     *
     * @return \phpbb\files\types\form A phpbb\files\types\form instance
     */
    protected function getFiles_Types_FormService()
    {
        return new \phpbb\files\types\form($this->get('files.factory'), $this->get('language'), $this->get('php_ini'), $this->get('plupload'), $this->get('request'));
    }

    /**
     * Gets the 'files.types.local' service.
     *
     * @return \phpbb\files\types\local A phpbb\files\types\local instance
     */
    protected function getFiles_Types_LocalService()
    {
        return new \phpbb\files\types\local($this->get('files.factory'), $this->get('language'), $this->get('php_ini'), $this->get('request'));
    }

    /**
     * Gets the 'files.types.remote' service.
     *
     * @return \phpbb\files\types\remote A phpbb\files\types\remote instance
     */
    protected function getFiles_Types_RemoteService()
    {
        return new \phpbb\files\types\remote($this->get('config'), $this->get('files.factory'), $this->get('language'), $this->get('php_ini'), $this->get('request'), './');
    }

    /**
     * Gets the 'files.upload' service.
     *
     * @return \phpbb\files\upload A phpbb\files\upload instance
     */
    protected function getFiles_UploadService()
    {
        return new \phpbb\files\upload($this->get('filesystem'), $this->get('files.factory'), $this->get('language'), $this->get('php_ini'), $this->get('request'));
    }

    /**
     * Gets the 'filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\filesystem\filesystem A phpbb\filesystem\filesystem instance
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \phpbb\filesystem\filesystem();
    }

    /**
     * Gets the 'group_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\group\helper A phpbb\group\helper instance
     */
    protected function getGroupHelperService()
    {
        return $this->services['group_helper'] = new \phpbb\group\helper($this->get('language'));
    }

    /**
     * Gets the 'groupposition.legend' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\groupposition\legend A phpbb\groupposition\legend instance
     */
    protected function getGroupposition_LegendService()
    {
        return $this->services['groupposition.legend'] = new \phpbb\groupposition\legend($this->get('dbal.conn'), $this->get('user'));
    }

    /**
     * Gets the 'groupposition.teampage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\groupposition\teampage A phpbb\groupposition\teampage instance
     */
    protected function getGroupposition_TeampageService()
    {
        return $this->services['groupposition.teampage'] = new \phpbb\groupposition\teampage($this->get('dbal.conn'), $this->get('user'), $this->get('cache.driver'));
    }

    /**
     * Gets the 'hook_finder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\hook\finder A phpbb\hook\finder instance
     */
    protected function getHookFinderService()
    {
        return $this->services['hook_finder'] = new \phpbb\hook\finder('./', 'php', $this->get('cache.driver'));
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel A Symfony\Component\HttpKernel\HttpKernel instance
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel($this->get('dispatcher'), $this->get('controller.resolver'), $this->get('request_stack'));
    }

    /**
     * Gets the 'kernel_exception_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\event\kernel_exception_subscriber A phpbb\event\kernel_exception_subscriber instance
     */
    protected function getKernelExceptionSubscriberService()
    {
        return $this->services['kernel_exception_subscriber'] = new \phpbb\event\kernel_exception_subscriber($this->get('template'), $this->get('language'));
    }

    /**
     * Gets the 'kernel_terminate_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\event\kernel_terminate_subscriber A phpbb\event\kernel_terminate_subscriber instance
     */
    protected function getKernelTerminateSubscriberService()
    {
        return $this->services['kernel_terminate_subscriber'] = new \phpbb\event\kernel_terminate_subscriber();
    }

    /**
     * Gets the 'language' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\language\language A phpbb\language\language instance
     */
    protected function getLanguageService()
    {
        return $this->services['language'] = new \phpbb\language\language($this->get('language.loader'));
    }

    /**
     * Gets the 'language.helper.language_file' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\language\language_file_helper A phpbb\language\language_file_helper instance
     */
    protected function getLanguage_Helper_LanguageFileService()
    {
        return $this->services['language.helper.language_file'] = new \phpbb\language\language_file_helper('./');
    }

    /**
     * Gets the 'language.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\language\language_file_loader A phpbb\language\language_file_loader instance
     */
    protected function getLanguage_LoaderService()
    {
        $this->services['language.loader'] = $instance = new \phpbb\language\language_file_loader('./', 'php');

        $instance->set_extension_manager($this->get('ext.manager'));

        return $instance;
    }

    /**
     * Gets the 'log' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\log\log A phpbb\log\log instance
     */
    protected function getLogService()
    {
        return $this->services['log'] = new \phpbb\log\log($this->get('dbal.conn'), $this->get('user'), $this->get('auth'), $this->get('dispatcher'), './', 'adm/', 'php', 'bb_log');
    }

    /**
     * Gets the 'message.form.admin' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\message\admin_form A phpbb\message\admin_form instance
     */
    protected function getMessage_Form_AdminService()
    {
        return $this->services['message.form.admin'] = new \phpbb\message\admin_form($this->get('auth'), $this->get('config'), $this->get('config_text'), $this->get('dbal.conn'), $this->get('user'), './', 'php');
    }

    /**
     * Gets the 'message.form.topic' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\message\topic_form A phpbb\message\topic_form instance
     */
    protected function getMessage_Form_TopicService()
    {
        return $this->services['message.form.topic'] = new \phpbb\message\topic_form($this->get('auth'), $this->get('config'), $this->get('dbal.conn'), $this->get('user'), './', 'php');
    }

    /**
     * Gets the 'message.form.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\message\user_form A phpbb\message\user_form instance
     */
    protected function getMessage_Form_UserService()
    {
        return $this->services['message.form.user'] = new \phpbb\message\user_form($this->get('auth'), $this->get('config'), $this->get('dbal.conn'), $this->get('user'), './', 'php');
    }

    /**
     * Gets the 'migrator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\migrator A phpbb\db\migrator instance
     */
    protected function getMigratorService()
    {
        return $this->services['migrator'] = new \phpbb\db\migrator($this, $this->get('config'), $this->get('dbal.conn'), $this->get('dbal.tools'), 'bb_migrations', './', 'php', 'bb_', $this->get('migrator.tool_collection'), $this->get('migrator.helper'));
    }

    /**
     * Gets the 'migrator.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\migration\helper A phpbb\db\migration\helper instance
     */
    protected function getMigrator_HelperService()
    {
        return $this->services['migrator.helper'] = new \phpbb\db\migration\helper();
    }

    /**
     * Gets the 'migrator.tool.config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\migration\tool\config A phpbb\db\migration\tool\config instance
     */
    protected function getMigrator_Tool_ConfigService()
    {
        return $this->services['migrator.tool.config'] = new \phpbb\db\migration\tool\config($this->get('config'));
    }

    /**
     * Gets the 'migrator.tool.config_text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\migration\tool\config_text A phpbb\db\migration\tool\config_text instance
     */
    protected function getMigrator_Tool_ConfigTextService()
    {
        return $this->services['migrator.tool.config_text'] = new \phpbb\db\migration\tool\config_text($this->get('config_text'));
    }

    /**
     * Gets the 'migrator.tool.module' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\migration\tool\module A phpbb\db\migration\tool\module instance
     */
    protected function getMigrator_Tool_ModuleService()
    {
        return $this->services['migrator.tool.module'] = new \phpbb\db\migration\tool\module($this->get('dbal.conn'), $this->get('cache'), $this->get('user'), $this->get('module.manager'), './', 'php', 'bb_modules');
    }

    /**
     * Gets the 'migrator.tool.permission' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\db\migration\tool\permission A phpbb\db\migration\tool\permission instance
     */
    protected function getMigrator_Tool_PermissionService()
    {
        return $this->services['migrator.tool.permission'] = new \phpbb\db\migration\tool\permission($this->get('dbal.conn'), $this->get('cache'), $this->get('auth'), './', 'php');
    }

    /**
     * Gets the 'migrator.tool_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getMigrator_ToolCollectionService()
    {
        $this->services['migrator.tool_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('migrator.tool.config');
        $instance->add('migrator.tool.config_text');
        $instance->add('migrator.tool.module');
        $instance->add('migrator.tool.permission');

        return $instance;
    }

    /**
     * Gets the 'mimetype.content_guesser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\mimetype\content_guesser A phpbb\mimetype\content_guesser instance
     */
    protected function getMimetype_ContentGuesserService()
    {
        $this->services['mimetype.content_guesser'] = $instance = new \phpbb\mimetype\content_guesser();

        $instance->set_priority(-1);

        return $instance;
    }

    /**
     * Gets the 'mimetype.extension_guesser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\mimetype\extension_guesser A phpbb\mimetype\extension_guesser instance
     */
    protected function getMimetype_ExtensionGuesserService()
    {
        $this->services['mimetype.extension_guesser'] = $instance = new \phpbb\mimetype\extension_guesser();

        $instance->set_priority(-2);

        return $instance;
    }

    /**
     * Gets the 'mimetype.filebinary_mimetype_guesser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\File\MimeType\FileBinaryMimeTypeGuesser A Symfony\Component\HttpFoundation\File\MimeType\FileBinaryMimeTypeGuesser instance
     */
    protected function getMimetype_FilebinaryMimetypeGuesserService()
    {
        return $this->services['mimetype.filebinary_mimetype_guesser'] = new \Symfony\Component\HttpFoundation\File\MimeType\FileBinaryMimeTypeGuesser();
    }

    /**
     * Gets the 'mimetype.fileinfo_mimetype_guesser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser A Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser instance
     */
    protected function getMimetype_FileinfoMimetypeGuesserService()
    {
        return $this->services['mimetype.fileinfo_mimetype_guesser'] = new \Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser();
    }

    /**
     * Gets the 'mimetype.guesser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\mimetype\guesser A phpbb\mimetype\guesser instance
     */
    protected function getMimetype_GuesserService()
    {
        return $this->services['mimetype.guesser'] = new \phpbb\mimetype\guesser($this->get('mimetype.guesser_collection'));
    }

    /**
     * Gets the 'mimetype.guesser_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getMimetype_GuesserCollectionService()
    {
        $this->services['mimetype.guesser_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('mimetype.fileinfo_mimetype_guesser');
        $instance->add('mimetype.filebinary_mimetype_guesser');
        $instance->add('mimetype.content_guesser');
        $instance->add('mimetype.extension_guesser');

        return $instance;
    }

    /**
     * Gets the 'module.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\module\module_manager A phpbb\module\module_manager instance
     */
    protected function getModule_ManagerService()
    {
        return $this->services['module.manager'] = new \phpbb\module\module_manager($this->get('cache.driver'), $this->get('dbal.conn'), $this->get('ext.manager'), 'bb_modules', './', 'php');
    }

    /**
     * Gets the 'notification.method.board' service.
     *
     * @return \phpbb\notification\method\board A phpbb\notification\method\board instance
     */
    protected function getNotification_Method_BoardService()
    {
        return new \phpbb\notification\method\board($this->get('user_loader'), $this->get('dbal.conn'), $this->get('cache.driver'), $this->get('user'), $this->get('config'), 'bb_notification_types', 'bb_notifications');
    }

    /**
     * Gets the 'notification.method.email' service.
     *
     * @return \phpbb\notification\method\email A phpbb\notification\method\email instance
     */
    protected function getNotification_Method_EmailService()
    {
        return new \phpbb\notification\method\email($this->get('user_loader'), $this->get('user'), $this->get('config'), './', 'php');
    }

    /**
     * Gets the 'notification.method.jabber' service.
     *
     * @return \phpbb\notification\method\jabber A phpbb\notification\method\jabber instance
     */
    protected function getNotification_Method_JabberService()
    {
        return new \phpbb\notification\method\jabber($this->get('user_loader'), $this->get('user'), $this->get('config'), './', 'php');
    }

    /**
     * Gets the 'notification.method_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getNotification_MethodCollectionService()
    {
        $this->services['notification.method_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('notification.method.board');
        $instance->add('notification.method.email');
        $instance->add('notification.method.jabber');

        return $instance;
    }

    /**
     * Gets the 'notification.type.admin_activate_user' service.
     *
     * @return \phpbb\notification\type\admin_activate_user A phpbb\notification\type\admin_activate_user instance
     */
    protected function getNotification_Type_AdminActivateUserService()
    {
        $instance = new \phpbb\notification\type\admin_activate_user($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.approve_post' service.
     *
     * @return \phpbb\notification\type\approve_post A phpbb\notification\type\approve_post instance
     */
    protected function getNotification_Type_ApprovePostService()
    {
        $instance = new \phpbb\notification\type\approve_post($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.approve_topic' service.
     *
     * @return \phpbb\notification\type\approve_topic A phpbb\notification\type\approve_topic instance
     */
    protected function getNotification_Type_ApproveTopicService()
    {
        $instance = new \phpbb\notification\type\approve_topic($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.bookmark' service.
     *
     * @return \phpbb\notification\type\bookmark A phpbb\notification\type\bookmark instance
     */
    protected function getNotification_Type_BookmarkService()
    {
        $instance = new \phpbb\notification\type\bookmark($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.disapprove_post' service.
     *
     * @return \phpbb\notification\type\disapprove_post A phpbb\notification\type\disapprove_post instance
     */
    protected function getNotification_Type_DisapprovePostService()
    {
        $instance = new \phpbb\notification\type\disapprove_post($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.disapprove_topic' service.
     *
     * @return \phpbb\notification\type\disapprove_topic A phpbb\notification\type\disapprove_topic instance
     */
    protected function getNotification_Type_DisapproveTopicService()
    {
        $instance = new \phpbb\notification\type\disapprove_topic($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.group_request' service.
     *
     * @return \phpbb\notification\type\group_request A phpbb\notification\type\group_request instance
     */
    protected function getNotification_Type_GroupRequestService()
    {
        $instance = new \phpbb\notification\type\group_request($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.group_request_approved' service.
     *
     * @return \phpbb\notification\type\group_request_approved A phpbb\notification\type\group_request_approved instance
     */
    protected function getNotification_Type_GroupRequestApprovedService()
    {
        return new \phpbb\notification\type\group_request_approved($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');
    }

    /**
     * Gets the 'notification.type.pm' service.
     *
     * @return \phpbb\notification\type\pm A phpbb\notification\type\pm instance
     */
    protected function getNotification_Type_PmService()
    {
        $instance = new \phpbb\notification\type\pm($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.post' service.
     *
     * @return \phpbb\notification\type\post A phpbb\notification\type\post instance
     */
    protected function getNotification_Type_PostService()
    {
        $instance = new \phpbb\notification\type\post($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.post_in_queue' service.
     *
     * @return \phpbb\notification\type\post_in_queue A phpbb\notification\type\post_in_queue instance
     */
    protected function getNotification_Type_PostInQueueService()
    {
        $instance = new \phpbb\notification\type\post_in_queue($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.quote' service.
     *
     * @return \phpbb\notification\type\quote A phpbb\notification\type\quote instance
     */
    protected function getNotification_Type_QuoteService()
    {
        $instance = new \phpbb\notification\type\quote($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));
        $instance->set_utils($this->get('text_formatter.s9e.utils'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.report_pm' service.
     *
     * @return \phpbb\notification\type\report_pm A phpbb\notification\type\report_pm instance
     */
    protected function getNotification_Type_ReportPmService()
    {
        $instance = new \phpbb\notification\type\report_pm($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.report_pm_closed' service.
     *
     * @return \phpbb\notification\type\report_pm_closed A phpbb\notification\type\report_pm_closed instance
     */
    protected function getNotification_Type_ReportPmClosedService()
    {
        $instance = new \phpbb\notification\type\report_pm_closed($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.report_post' service.
     *
     * @return \phpbb\notification\type\report_post A phpbb\notification\type\report_post instance
     */
    protected function getNotification_Type_ReportPostService()
    {
        $instance = new \phpbb\notification\type\report_post($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.report_post_closed' service.
     *
     * @return \phpbb\notification\type\report_post_closed A phpbb\notification\type\report_post_closed instance
     */
    protected function getNotification_Type_ReportPostClosedService()
    {
        $instance = new \phpbb\notification\type\report_post_closed($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.topic' service.
     *
     * @return \phpbb\notification\type\topic A phpbb\notification\type\topic instance
     */
    protected function getNotification_Type_TopicService()
    {
        $instance = new \phpbb\notification\type\topic($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type.topic_in_queue' service.
     *
     * @return \phpbb\notification\type\topic_in_queue A phpbb\notification\type\topic_in_queue instance
     */
    protected function getNotification_Type_TopicInQueueService()
    {
        $instance = new \phpbb\notification\type\topic_in_queue($this->get('dbal.conn'), $this->get('language'), $this->get('user'), $this->get('auth'), './', 'php', 'bb_user_notifications');

        $instance->set_user_loader($this->get('user_loader'));
        $instance->set_config($this->get('config'));

        return $instance;
    }

    /**
     * Gets the 'notification.type_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getNotification_TypeCollectionService()
    {
        $this->services['notification.type_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('notification.type.admin_activate_user');
        $instance->add('notification.type.approve_post');
        $instance->add('notification.type.approve_topic');
        $instance->add('notification.type.bookmark');
        $instance->add('notification.type.disapprove_post');
        $instance->add('notification.type.disapprove_topic');
        $instance->add('notification.type.group_request');
        $instance->add('notification.type.group_request_approved');
        $instance->add('notification.type.pm');
        $instance->add('notification.type.post');
        $instance->add('notification.type.post_in_queue');
        $instance->add('notification.type.quote');
        $instance->add('notification.type.report_pm');
        $instance->add('notification.type.report_pm_closed');
        $instance->add('notification.type.report_post');
        $instance->add('notification.type.report_post_closed');
        $instance->add('notification.type.topic');
        $instance->add('notification.type.topic_in_queue');

        return $instance;
    }

    /**
     * Gets the 'notification_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\notification\manager A phpbb\notification\manager instance
     */
    protected function getNotificationManagerService()
    {
        return $this->services['notification_manager'] = new \phpbb\notification\manager($this->get('notification.type_collection'), $this->get('notification.method_collection'), $this, $this->get('user_loader'), $this->get('dispatcher'), $this->get('dbal.conn'), $this->get('cache'), $this->get('language'), $this->get('user'), 'bb_notification_types', 'bb_user_notifications');
    }

    /**
     * Gets the 'pagination' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\pagination A phpbb\pagination instance
     */
    protected function getPaginationService()
    {
        return $this->services['pagination'] = new \phpbb\pagination($this->get('template'), $this->get('user'), $this->get('controller.helper'), $this->get('dispatcher'));
    }

    /**
     * Gets the 'passwords.driver.bcrypt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\bcrypt A phpbb\passwords\driver\bcrypt instance
     */
    protected function getPasswords_Driver_BcryptService()
    {
        return $this->services['passwords.driver.bcrypt'] = new \phpbb\passwords\driver\bcrypt($this->get('config'), $this->get('passwords.driver_helper'), 10);
    }

    /**
     * Gets the 'passwords.driver.bcrypt_2y' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\bcrypt_2y A phpbb\passwords\driver\bcrypt_2y instance
     */
    protected function getPasswords_Driver_Bcrypt2yService()
    {
        return $this->services['passwords.driver.bcrypt_2y'] = new \phpbb\passwords\driver\bcrypt_2y($this->get('config'), $this->get('passwords.driver_helper'), 10);
    }

    /**
     * Gets the 'passwords.driver.bcrypt_wcf2' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\bcrypt_wcf2 A phpbb\passwords\driver\bcrypt_wcf2 instance
     */
    protected function getPasswords_Driver_BcryptWcf2Service()
    {
        return $this->services['passwords.driver.bcrypt_wcf2'] = new \phpbb\passwords\driver\bcrypt_wcf2($this->get('passwords.driver.bcrypt'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.convert_password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\convert_password A phpbb\passwords\driver\convert_password instance
     */
    protected function getPasswords_Driver_ConvertPasswordService()
    {
        return $this->services['passwords.driver.convert_password'] = new \phpbb\passwords\driver\convert_password($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.md5_mybb' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\md5_mybb A phpbb\passwords\driver\md5_mybb instance
     */
    protected function getPasswords_Driver_Md5MybbService()
    {
        return $this->services['passwords.driver.md5_mybb'] = new \phpbb\passwords\driver\md5_mybb($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.md5_phpbb2' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\md5_phpbb2 A phpbb\passwords\driver\md5_phpbb2 instance
     */
    protected function getPasswords_Driver_Md5Phpbb2Service()
    {
        return $this->services['passwords.driver.md5_phpbb2'] = new \phpbb\passwords\driver\md5_phpbb2($this->get('request'), $this->get('passwords.driver.salted_md5'), $this->get('passwords.driver_helper'), './', 'php');
    }

    /**
     * Gets the 'passwords.driver.md5_vb' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\md5_vb A phpbb\passwords\driver\md5_vb instance
     */
    protected function getPasswords_Driver_Md5VbService()
    {
        return $this->services['passwords.driver.md5_vb'] = new \phpbb\passwords\driver\md5_vb($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.phpass' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\phpass A phpbb\passwords\driver\phpass instance
     */
    protected function getPasswords_Driver_PhpassService()
    {
        return $this->services['passwords.driver.phpass'] = new \phpbb\passwords\driver\phpass($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.salted_md5' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\salted_md5 A phpbb\passwords\driver\salted_md5 instance
     */
    protected function getPasswords_Driver_SaltedMd5Service()
    {
        return $this->services['passwords.driver.salted_md5'] = new \phpbb\passwords\driver\salted_md5($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.sha1' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\sha1 A phpbb\passwords\driver\sha1 instance
     */
    protected function getPasswords_Driver_Sha1Service()
    {
        return $this->services['passwords.driver.sha1'] = new \phpbb\passwords\driver\sha1($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.sha1_smf' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\sha1_smf A phpbb\passwords\driver\sha1_smf instance
     */
    protected function getPasswords_Driver_Sha1SmfService()
    {
        return $this->services['passwords.driver.sha1_smf'] = new \phpbb\passwords\driver\sha1_smf($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver.sha1_wcf1' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\sha1_wcf1 A phpbb\passwords\driver\sha1_wcf1 instance
     */
    protected function getPasswords_Driver_Sha1Wcf1Service()
    {
        return $this->services['passwords.driver.sha1_wcf1'] = new \phpbb\passwords\driver\sha1_wcf1($this->get('config'), $this->get('passwords.driver_helper'));
    }

    /**
     * Gets the 'passwords.driver_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getPasswords_DriverCollectionService()
    {
        $this->services['passwords.driver_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('passwords.driver.bcrypt');
        $instance->add('passwords.driver.bcrypt_2y');
        $instance->add('passwords.driver.bcrypt_wcf2');
        $instance->add('passwords.driver.salted_md5');
        $instance->add('passwords.driver.phpass');
        $instance->add('passwords.driver.convert_password');
        $instance->add('passwords.driver.sha1_smf');
        $instance->add('passwords.driver.sha1_wcf1');
        $instance->add('passwords.driver.sha1');
        $instance->add('passwords.driver.md5_phpbb2');
        $instance->add('passwords.driver.md5_mybb');
        $instance->add('passwords.driver.md5_vb');

        return $instance;
    }

    /**
     * Gets the 'passwords.driver_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\driver\helper A phpbb\passwords\driver\helper instance
     */
    protected function getPasswords_DriverHelperService()
    {
        return $this->services['passwords.driver_helper'] = new \phpbb\passwords\driver\helper($this->get('config'));
    }

    /**
     * Gets the 'passwords.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\helper A phpbb\passwords\helper instance
     */
    protected function getPasswords_HelperService()
    {
        return $this->services['passwords.helper'] = new \phpbb\passwords\helper();
    }

    /**
     * Gets the 'passwords.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\passwords\manager A phpbb\passwords\manager instance
     */
    protected function getPasswords_ManagerService()
    {
        return $this->services['passwords.manager'] = new \phpbb\passwords\manager($this->get('config'), $this->get('passwords.driver_collection'), $this->get('passwords.helper'), array(0 => 'passwords.driver.bcrypt_2y', 1 => 'passwords.driver.bcrypt', 2 => 'passwords.driver.salted_md5', 3 => 'passwords.driver.phpass'));
    }

    /**
     * Gets the 'passwords.update.lock' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\lock\db A phpbb\lock\db instance
     */
    protected function getPasswords_Update_LockService()
    {
        return $this->services['passwords.update.lock'] = new \phpbb\lock\db('update_hashes_lock', $this->get('config'), $this->get('dbal.conn'));
    }

    /**
     * Gets the 'path_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\path_helper A phpbb\path_helper instance
     */
    protected function getPathHelperService()
    {
        return $this->services['path_helper'] = new \phpbb\path_helper($this->get('symfony_request'), $this->get('filesystem'), $this->get('request'), './', 'php', 'adm/');
    }

    /**
     * Gets the 'php_ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \bantu\IniGetWrapper\IniGetWrapper A bantu\IniGetWrapper\IniGetWrapper instance
     */
    protected function getPhpIniService()
    {
        return $this->services['php_ini'] = new \bantu\IniGetWrapper\IniGetWrapper();
    }

    /**
     * Gets the 'phpbb.feed.controller' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\feed\controller\feed A phpbb\feed\controller\feed instance
     */
    protected function getPhpbb_Feed_ControllerService()
    {
        return $this->services['phpbb.feed.controller'] = new \phpbb\feed\controller\feed($this->get('template.twig.environment'), $this->get('symfony_request'), $this->get('controller.helper'), $this->get('config'), $this->get('dbal.conn'), $this, $this->get('feed.helper'), $this->get('user'), $this->get('auth'), $this->get('dispatcher'), 'php');
    }

    /**
     * Gets the 'phpbb.help.controller.bbcode' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\help\controller\bbcode A phpbb\help\controller\bbcode instance
     */
    protected function getPhpbb_Help_Controller_BbcodeService()
    {
        return $this->services['phpbb.help.controller.bbcode'] = new \phpbb\help\controller\bbcode($this->get('controller.helper'), $this->get('phpbb.help.manager'), $this->get('template'), $this->get('language'), './', 'php');
    }

    /**
     * Gets the 'phpbb.help.controller.faq' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\help\controller\faq A phpbb\help\controller\faq instance
     */
    protected function getPhpbb_Help_Controller_FaqService()
    {
        return $this->services['phpbb.help.controller.faq'] = new \phpbb\help\controller\faq($this->get('controller.helper'), $this->get('phpbb.help.manager'), $this->get('template'), $this->get('language'), './', 'php');
    }

    /**
     * Gets the 'phpbb.help.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\help\manager A phpbb\help\manager instance
     */
    protected function getPhpbb_Help_ManagerService()
    {
        return $this->services['phpbb.help.manager'] = new \phpbb\help\manager($this->get('dispatcher'), $this->get('language'), $this->get('template'));
    }

    /**
     * Gets the 'phpbb.report.controller' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\report\controller\report A phpbb\report\controller\report instance
     */
    protected function getPhpbb_Report_ControllerService()
    {
        return $this->services['phpbb.report.controller'] = new \phpbb\report\controller\report($this->get('config'), $this->get('user'), $this->get('template'), $this->get('controller.helper'), $this->get('request'), $this->get('captcha.factory'), $this->get('phpbb.report.handler_factory'), $this->get('phpbb.report.report_reason_list_provider'), './', 'php');
    }

    /**
     * Gets the 'phpbb.report.handler_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\report\handler_factory A phpbb\report\handler_factory instance
     */
    protected function getPhpbb_Report_HandlerFactoryService()
    {
        return $this->services['phpbb.report.handler_factory'] = new \phpbb\report\handler_factory($this);
    }

    /**
     * Gets the 'phpbb.report.handlers.report_handler_pm' service.
     *
     * @return \phpbb\report\report_handler_pm A phpbb\report\report_handler_pm instance
     */
    protected function getPhpbb_Report_Handlers_ReportHandlerPmService()
    {
        return new \phpbb\report\report_handler_pm($this->get('dbal.conn.driver'), $this->get('dispatcher'), $this->get('config'), $this->get('auth'), $this->get('user'), $this->get('notification_manager'));
    }

    /**
     * Gets the 'phpbb.report.handlers.report_handler_post' service.
     *
     * @return \phpbb\report\report_handler_post A phpbb\report\report_handler_post instance
     */
    protected function getPhpbb_Report_Handlers_ReportHandlerPostService()
    {
        return new \phpbb\report\report_handler_post($this->get('dbal.conn.driver'), $this->get('dispatcher'), $this->get('config'), $this->get('auth'), $this->get('user'), $this->get('notification_manager'));
    }

    /**
     * Gets the 'phpbb.report.report_reason_list_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\report\report_reason_list_provider A phpbb\report\report_reason_list_provider instance
     */
    protected function getPhpbb_Report_ReportReasonListProviderService()
    {
        return $this->services['phpbb.report.report_reason_list_provider'] = new \phpbb\report\report_reason_list_provider($this->get('dbal.conn.driver'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'phpbb.viglink.acp_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\viglink\event\acp_listener A phpbb\viglink\event\acp_listener instance
     */
    protected function getPhpbb_Viglink_AcpListenerService()
    {
        return $this->services['phpbb.viglink.acp_listener'] = new \phpbb\viglink\event\acp_listener($this->get('config'), $this->get('language'), $this->get('request'), $this->get('template'), $this->get('user'), $this->get('phpbb.viglink.helper'), './', 'php');
    }

    /**
     * Gets the 'phpbb.viglink.cron.task.viglink' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\viglink\cron\viglink A phpbb\viglink\cron\viglink instance
     */
    protected function getPhpbb_Viglink_Cron_Task_ViglinkService()
    {
        $this->services['phpbb.viglink.cron.task.viglink'] = $instance = new \phpbb\viglink\cron\viglink($this->get('config'), $this->get('phpbb.viglink.helper'));

        $instance->set_name('cron.task.viglink');

        return $instance;
    }

    /**
     * Gets the 'phpbb.viglink.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\viglink\acp\viglink_helper A phpbb\viglink\acp\viglink_helper instance
     */
    protected function getPhpbb_Viglink_HelperService()
    {
        return $this->services['phpbb.viglink.helper'] = new \phpbb\viglink\acp\viglink_helper($this->get('cache.driver'), $this->get('config'), $this->get('file_downloader'), $this->get('language'), $this->get('log'), $this->get('user'));
    }

    /**
     * Gets the 'phpbb.viglink.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\viglink\event\listener A phpbb\viglink\event\listener instance
     */
    protected function getPhpbb_Viglink_ListenerService()
    {
        return $this->services['phpbb.viglink.listener'] = new \phpbb\viglink\event\listener($this->get('config'), $this->get('template'));
    }

    /**
     * Gets the 'plupload' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\plupload\plupload A phpbb\plupload\plupload instance
     */
    protected function getPluploadService()
    {
        return $this->services['plupload'] = new \phpbb\plupload\plupload('./', $this->get('config'), $this->get('request'), $this->get('user'), $this->get('php_ini'), $this->get('mimetype.guesser'));
    }

    /**
     * Gets the 'profilefields.lang_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\lang_helper A phpbb\profilefields\lang_helper instance
     */
    protected function getProfilefields_LangHelperService()
    {
        return $this->services['profilefields.lang_helper'] = new \phpbb\profilefields\lang_helper($this->get('dbal.conn'), 'bb_profile_fields_lang');
    }

    /**
     * Gets the 'profilefields.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\manager A phpbb\profilefields\manager instance
     */
    protected function getProfilefields_ManagerService()
    {
        return $this->services['profilefields.manager'] = new \phpbb\profilefields\manager($this->get('auth'), $this->get('dbal.conn'), $this->get('dispatcher'), $this->get('request'), $this->get('template'), $this->get('profilefields.type_collection'), $this->get('user'), 'bb_profile_fields', 'bb_profile_lang', 'bb_profile_fields_data');
    }

    /**
     * Gets the 'profilefields.type.bool' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_bool A phpbb\profilefields\type\type_bool instance
     */
    protected function getProfilefields_Type_BoolService()
    {
        return $this->services['profilefields.type.bool'] = new \phpbb\profilefields\type\type_bool($this->get('profilefields.lang_helper'), $this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type.date' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_date A phpbb\profilefields\type\type_date instance
     */
    protected function getProfilefields_Type_DateService()
    {
        return $this->services['profilefields.type.date'] = new \phpbb\profilefields\type\type_date($this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type.dropdown' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_dropdown A phpbb\profilefields\type\type_dropdown instance
     */
    protected function getProfilefields_Type_DropdownService()
    {
        return $this->services['profilefields.type.dropdown'] = new \phpbb\profilefields\type\type_dropdown($this->get('profilefields.lang_helper'), $this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type.googleplus' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_googleplus A phpbb\profilefields\type\type_googleplus instance
     */
    protected function getProfilefields_Type_GoogleplusService()
    {
        return $this->services['profilefields.type.googleplus'] = new \phpbb\profilefields\type\type_googleplus($this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type.int' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_int A phpbb\profilefields\type\type_int instance
     */
    protected function getProfilefields_Type_IntService()
    {
        return $this->services['profilefields.type.int'] = new \phpbb\profilefields\type\type_int($this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type.string' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_string A phpbb\profilefields\type\type_string instance
     */
    protected function getProfilefields_Type_StringService()
    {
        return $this->services['profilefields.type.string'] = new \phpbb\profilefields\type\type_string($this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type.text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_text A phpbb\profilefields\type\type_text instance
     */
    protected function getProfilefields_Type_TextService()
    {
        return $this->services['profilefields.type.text'] = new \phpbb\profilefields\type\type_text($this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type.url' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\profilefields\type\type_url A phpbb\profilefields\type\type_url instance
     */
    protected function getProfilefields_Type_UrlService()
    {
        return $this->services['profilefields.type.url'] = new \phpbb\profilefields\type\type_url($this->get('request'), $this->get('template'), $this->get('user'));
    }

    /**
     * Gets the 'profilefields.type_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getProfilefields_TypeCollectionService()
    {
        $this->services['profilefields.type_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('profilefields.type.bool');
        $instance->add('profilefields.type.date');
        $instance->add('profilefields.type.dropdown');
        $instance->add('profilefields.type.googleplus');
        $instance->add('profilefields.type.int');
        $instance->add('profilefields.type.string');
        $instance->add('profilefields.type.text');
        $instance->add('profilefields.type.url');

        return $instance;
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\request\request A phpbb\request\request instance
     */
    protected function getRequestService()
    {
        return $this->services['request'] = new \phpbb\request\request(NULL, true);
    }

    /**
     * Gets the 'request_stack' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack A Symfony\Component\HttpFoundation\RequestStack instance
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the 'router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\routing\router A phpbb\routing\router instance
     */
    protected function getRouterService()
    {
        return $this->services['router'] = new \phpbb\routing\router($this, $this->get('routing.chained_resources_locator'), $this->get('routing.delegated_loader'), 'php', './cache/production/');
    }

    /**
     * Gets the 'router.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener A Symfony\Component\HttpKernel\EventListener\RouterListener instance
     */
    protected function getRouter_ListenerService()
    {
        return $this->services['router.listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener($this->get('router'), NULL, NULL, $this->get('request_stack'));
    }

    /**
     * Gets the 'routing.chained_resources_locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\routing\resources_locator\chained_resources_locator A phpbb\routing\resources_locator\chained_resources_locator instance
     */
    protected function getRouting_ChainedResourcesLocatorService()
    {
        return $this->services['routing.chained_resources_locator'] = new \phpbb\routing\resources_locator\chained_resources_locator($this->get('routing.resources_locator.collection'));
    }

    /**
     * Gets the 'routing.delegated_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Config\Loader\DelegatingLoader A Symfony\Component\Config\Loader\DelegatingLoader instance
     */
    protected function getRouting_DelegatedLoaderService()
    {
        return $this->services['routing.delegated_loader'] = new \Symfony\Component\Config\Loader\DelegatingLoader($this->get('routing.resolver'));
    }

    /**
     * Gets the 'routing.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\routing\helper A phpbb\routing\helper instance
     */
    protected function getRouting_HelperService()
    {
        return $this->services['routing.helper'] = new \phpbb\routing\helper($this->get('config'), $this->get('router'), $this->get('symfony_request'), $this->get('request'), $this->get('filesystem'), './', 'php');
    }

    /**
     * Gets the 'routing.loader.collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getRouting_Loader_CollectionService()
    {
        $this->services['routing.loader.collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('routing.loader.yaml');

        return $instance;
    }

    /**
     * Gets the 'routing.loader.yaml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Loader\YamlFileLoader A Symfony\Component\Routing\Loader\YamlFileLoader instance
     */
    protected function getRouting_Loader_YamlService()
    {
        return $this->services['routing.loader.yaml'] = new \Symfony\Component\Routing\Loader\YamlFileLoader($this->get('file_locator'));
    }

    /**
     * Gets the 'routing.resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\routing\loader_resolver A phpbb\routing\loader_resolver instance
     */
    protected function getRouting_ResolverService()
    {
        return $this->services['routing.resolver'] = new \phpbb\routing\loader_resolver($this->get('routing.loader.collection'));
    }

    /**
     * Gets the 'routing.resources_locator.collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getRouting_ResourcesLocator_CollectionService()
    {
        $this->services['routing.resources_locator.collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('routing.resources_locator.default');

        return $instance;
    }

    /**
     * Gets the 'routing.resources_locator.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\routing\resources_locator\default_resources_locator A phpbb\routing\resources_locator\default_resources_locator instance
     */
    protected function getRouting_ResourcesLocator_DefaultService()
    {
        return $this->services['routing.resources_locator.default'] = new \phpbb\routing\resources_locator\default_resources_locator('./', 'production', $this->get('ext.manager'));
    }

    /**
     * Gets the 'symfony_request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\symfony_request A phpbb\symfony_request instance
     */
    protected function getSymfonyRequestService()
    {
        return $this->services['symfony_request'] = new \phpbb\symfony_request($this->get('request'));
    }

    /**
     * Gets the 'symfony_response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ResponseListener A Symfony\Component\HttpKernel\EventListener\ResponseListener instance
     */
    protected function getSymfonyResponseListenerService()
    {
        return $this->services['symfony_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the 'template' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\template\twig\twig A phpbb\template\twig\twig instance
     */
    protected function getTemplateService()
    {
        return $this->services['template'] = new \phpbb\template\twig\twig($this->get('path_helper'), $this->get('config'), $this->get('template_context'), $this->get('template.twig.environment'), './cache/production/twig/', $this->get('user'), $this->get('template.twig.extensions.collection'), $this->get('ext.manager'));
    }

    /**
     * Gets the 'template.twig.environment' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\template\twig\environment A phpbb\template\twig\environment instance
     */
    protected function getTemplate_Twig_EnvironmentService()
    {
        $this->services['template.twig.environment'] = $instance = new \phpbb\template\twig\environment($this->get('config'), $this->get('filesystem'), $this->get('path_helper'), './cache/production/twig/', $this->get('ext.manager'), $this->get('template.twig.loader'), $this->get('dispatcher'), array());

        $instance->setLexer($this->get('template.twig.lexer'));

        return $instance;
    }

    /**
     * Gets the 'template.twig.extensions.collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getTemplate_Twig_Extensions_CollectionService()
    {
        $this->services['template.twig.extensions.collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('template.twig.extensions.phpbb');
        $instance->add('template.twig.extensions.routing');

        return $instance;
    }

    /**
     * Gets the 'template.twig.extensions.debug' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Twig_Extension_Debug A Twig_Extension_Debug instance
     */
    protected function getTemplate_Twig_Extensions_DebugService()
    {
        return $this->services['template.twig.extensions.debug'] = new \Twig_Extension_Debug();
    }

    /**
     * Gets the 'template.twig.extensions.phpbb' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\template\twig\extension A phpbb\template\twig\extension instance
     */
    protected function getTemplate_Twig_Extensions_PhpbbService()
    {
        return $this->services['template.twig.extensions.phpbb'] = new \phpbb\template\twig\extension($this->get('template_context'), $this->get('language'));
    }

    /**
     * Gets the 'template.twig.extensions.routing' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\template\twig\extension\routing A phpbb\template\twig\extension\routing instance
     */
    protected function getTemplate_Twig_Extensions_RoutingService()
    {
        return $this->services['template.twig.extensions.routing'] = new \phpbb\template\twig\extension\routing($this->get('routing.helper'));
    }

    /**
     * Gets the 'template.twig.lexer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @param bool    $lazyLoad whether to try lazy-loading the service with a proxy
     *
     * @return \phpbb\template\twig\lexer A phpbb\template\twig\lexer instance
     */
    public function getTemplate_Twig_LexerService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;

            return $this->services['template.twig.lexer'] = new phpbbtemplatetwiglexer_00000000241ef4950000000021958d0d(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getTemplate_Twig_LexerService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                }
            );
        }

        return new \phpbb\template\twig\lexer($this->get('template.twig.environment'));
    }

    /**
     * Gets the 'template.twig.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\template\twig\loader A phpbb\template\twig\loader instance
     */
    protected function getTemplate_Twig_LoaderService()
    {
        return $this->services['template.twig.loader'] = new \phpbb\template\twig\loader($this->get('filesystem'));
    }

    /**
     * Gets the 'template_context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\template\context A phpbb\template\context instance
     */
    protected function getTemplateContextService()
    {
        return $this->services['template_context'] = new \phpbb\template\context();
    }

    /**
     * Gets the 'text_formatter.data_access' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textformatter\data_access A phpbb\textformatter\data_access instance
     */
    protected function getTextFormatter_DataAccessService()
    {
        return $this->services['text_formatter.data_access'] = new \phpbb\textformatter\data_access($this->get('dbal.conn'), 'bb_bbcodes', 'bb_smilies', 'bb_styles', 'bb_words', './styles/');
    }

    /**
     * Gets the 'text_formatter.s9e.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textformatter\s9e\factory A phpbb\textformatter\s9e\factory instance
     */
    protected function getTextFormatter_S9e_FactoryService()
    {
        return $this->services['text_formatter.s9e.factory'] = new \phpbb\textformatter\s9e\factory($this->get('text_formatter.data_access'), $this->get('cache.driver'), $this->get('dispatcher'), $this->get('config'), $this->get('text_formatter.s9e.link_helper'), './cache/production/', '_text_formatter_parser', '_text_formatter_renderer');
    }

    /**
     * Gets the 'text_formatter.s9e.link_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textformatter\s9e\link_helper A phpbb\textformatter\s9e\link_helper instance
     */
    protected function getTextFormatter_S9e_LinkHelperService()
    {
        return $this->services['text_formatter.s9e.link_helper'] = new \phpbb\textformatter\s9e\link_helper();
    }

    /**
     * Gets the 'text_formatter.s9e.parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textformatter\s9e\parser A phpbb\textformatter\s9e\parser instance
     */
    protected function getTextFormatter_S9e_ParserService()
    {
        return $this->services['text_formatter.s9e.parser'] = new \phpbb\textformatter\s9e\parser($this->get('cache.driver'), '_text_formatter_parser', $this->get('text_formatter.s9e.factory'), $this->get('dispatcher'));
    }

    /**
     * Gets the 'text_formatter.s9e.quote_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textformatter\s9e\quote_helper A phpbb\textformatter\s9e\quote_helper instance
     */
    protected function getTextFormatter_S9e_QuoteHelperService()
    {
        return $this->services['text_formatter.s9e.quote_helper'] = new \phpbb\textformatter\s9e\quote_helper($this->get('user'), './', 'php');
    }

    /**
     * Gets the 'text_formatter.s9e.renderer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textformatter\s9e\renderer A phpbb\textformatter\s9e\renderer instance
     */
    protected function getTextFormatter_S9e_RendererService()
    {
        $a = $this->get('config');

        $this->services['text_formatter.s9e.renderer'] = $instance = new \phpbb\textformatter\s9e\renderer($this->get('cache.driver'), './cache/production/', '_text_formatter_renderer', $this->get('text_formatter.s9e.factory'), $this->get('dispatcher'));

        $instance->configure_quote_helper($this->get('text_formatter.s9e.quote_helper'));
        $instance->configure_smilies_path($a, $this->get('path_helper'));
        $instance->configure_user($this->get('user'), $a, $this->get('auth'));

        return $instance;
    }

    /**
     * Gets the 'text_formatter.s9e.utils' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textformatter\s9e\utils A phpbb\textformatter\s9e\utils instance
     */
    protected function getTextFormatter_S9e_UtilsService()
    {
        return $this->services['text_formatter.s9e.utils'] = new \phpbb\textformatter\s9e\utils();
    }

    /**
     * Gets the 'text_reparser.contact_admin_info' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\contact_admin_info A phpbb\textreparser\plugins\contact_admin_info instance
     */
    protected function getTextReparser_ContactAdminInfoService()
    {
        $this->services['text_reparser.contact_admin_info'] = $instance = new \phpbb\textreparser\plugins\contact_admin_info($this->get('config_text'));

        $instance->set_name('contact_admin_info');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.forum_description' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\forum_description A phpbb\textreparser\plugins\forum_description instance
     */
    protected function getTextReparser_ForumDescriptionService()
    {
        $this->services['text_reparser.forum_description'] = $instance = new \phpbb\textreparser\plugins\forum_description($this->get('dbal.conn'), 'bb_forums');

        $instance->set_name('forum_description');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.forum_rules' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\forum_rules A phpbb\textreparser\plugins\forum_rules instance
     */
    protected function getTextReparser_ForumRulesService()
    {
        $this->services['text_reparser.forum_rules'] = $instance = new \phpbb\textreparser\plugins\forum_rules($this->get('dbal.conn'), 'bb_forums');

        $instance->set_name('forum_rules');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.group_description' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\group_description A phpbb\textreparser\plugins\group_description instance
     */
    protected function getTextReparser_GroupDescriptionService()
    {
        $this->services['text_reparser.group_description'] = $instance = new \phpbb\textreparser\plugins\group_description($this->get('dbal.conn'), 'bb_groups');

        $instance->set_name('group_description');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.lock' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\lock\db A phpbb\lock\db instance
     */
    protected function getTextReparser_LockService()
    {
        return $this->services['text_reparser.lock'] = new \phpbb\lock\db('reparse_lock', $this->get('config'), $this->get('dbal.conn'));
    }

    /**
     * Gets the 'text_reparser.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\manager A phpbb\textreparser\manager instance
     */
    protected function getTextReparser_ManagerService()
    {
        return $this->services['text_reparser.manager'] = new \phpbb\textreparser\manager($this->get('config'), $this->get('config_text'), $this->get('text_reparser_collection'));
    }

    /**
     * Gets the 'text_reparser.pm_text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\pm_text A phpbb\textreparser\plugins\pm_text instance
     */
    protected function getTextReparser_PmTextService()
    {
        $this->services['text_reparser.pm_text'] = $instance = new \phpbb\textreparser\plugins\pm_text($this->get('dbal.conn'), 'bb_privmsgs');

        $instance->set_name('pm_text');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.poll_option' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\poll_option A phpbb\textreparser\plugins\poll_option instance
     */
    protected function getTextReparser_PollOptionService()
    {
        $this->services['text_reparser.poll_option'] = $instance = new \phpbb\textreparser\plugins\poll_option($this->get('dbal.conn'));

        $instance->set_name('poll_option');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.poll_title' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\poll_title A phpbb\textreparser\plugins\poll_title instance
     */
    protected function getTextReparser_PollTitleService()
    {
        $this->services['text_reparser.poll_title'] = $instance = new \phpbb\textreparser\plugins\poll_title($this->get('dbal.conn'), 'bb_topics');

        $instance->set_name('poll_title');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.post_text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\post_text A phpbb\textreparser\plugins\post_text instance
     */
    protected function getTextReparser_PostTextService()
    {
        $this->services['text_reparser.post_text'] = $instance = new \phpbb\textreparser\plugins\post_text($this->get('dbal.conn'), 'bb_posts');

        $instance->set_name('post_text');

        return $instance;
    }

    /**
     * Gets the 'text_reparser.user_signature' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\textreparser\plugins\user_signature A phpbb\textreparser\plugins\user_signature instance
     */
    protected function getTextReparser_UserSignatureService()
    {
        $this->services['text_reparser.user_signature'] = $instance = new \phpbb\textreparser\plugins\user_signature($this->get('dbal.conn'), 'bb_users');

        $instance->set_name('user_signature');

        return $instance;
    }

    /**
     * Gets the 'text_reparser_collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\di\service_collection A phpbb\di\service_collection instance
     */
    protected function getTextReparserCollectionService()
    {
        $this->services['text_reparser_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('text_reparser.contact_admin_info');
        $instance->add('text_reparser.forum_description');
        $instance->add('text_reparser.forum_rules');
        $instance->add('text_reparser.group_description');
        $instance->add('text_reparser.pm_text');
        $instance->add('text_reparser.poll_option');
        $instance->add('text_reparser.poll_title');
        $instance->add('text_reparser.post_text');
        $instance->add('text_reparser.user_signature');

        return $instance;
    }

    /**
     * Gets the 'upload_imagesize' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FastImageSize\FastImageSize A FastImageSize\FastImageSize instance
     */
    protected function getUploadImagesizeService()
    {
        return $this->services['upload_imagesize'] = new \FastImageSize\FastImageSize();
    }

    /**
     * Gets the 'user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\user A phpbb\user instance
     */
    protected function getUserService()
    {
        return $this->services['user'] = new \phpbb\user($this->get('language'), '\\phpbb\\datetime');
    }

    /**
     * Gets the 'user_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\user_loader A phpbb\user_loader instance
     */
    protected function getUserLoaderService()
    {
        return $this->services['user_loader'] = new \phpbb\user_loader($this->get('dbal.conn'), './', 'php', 'bb_users');
    }

    /**
     * Gets the 'version_helper' service.
     *
     * @return \phpbb\version_helper A phpbb\version_helper instance
     */
    protected function getVersionHelperService()
    {
        return new \phpbb\version_helper($this->get('cache'), $this->get('config'), $this->get('file_downloader'), $this->get('user'));
    }

    /**
     * Gets the 'viewonline_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \phpbb\viewonline_helper A phpbb\viewonline_helper instance
     */
    protected function getViewonlineHelperService()
    {
        return $this->services['viewonline_helper'] = new \phpbb\viewonline_helper($this->get('filesystem'));
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        $name = strtolower($name);

        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }

        return $this->parameterBag;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'core.root_path' => './',
            'core.php_ext' => 'php',
            'core.environment' => 'production',
            'core.debug' => false,
            'core.cache_dir' => './cache/production/',
            'passwords.driver.bcrypt_cost' => 10,
            'text_formatter.cache.dir' => './cache/production/',
            'text_formatter.cache.parser.key' => '_text_formatter_parser',
            'text_formatter.cache.renderer.key' => '_text_formatter_renderer',
            'core.template.cache_path' => './cache/production/twig/',
            'tables.acl_groups' => 'bb_acl_groups',
            'tables.acl_options' => 'bb_acl_options',
            'tables.acl_roles' => 'bb_acl_roles',
            'tables.acl_roles_data' => 'bb_acl_roles_data',
            'tables.acl_users' => 'bb_acl_users',
            'tables.attachments' => 'bb_attachments',
            'tables.auth_provider_oauth_token_storage' => 'bb_oauth_tokens',
            'tables.auth_provider_oauth_states' => 'bb_oauth_states',
            'tables.auth_provider_oauth_account_assoc' => 'bb_oauth_accounts',
            'tables.banlist' => 'bb_banlist',
            'tables.bbcodes' => 'bb_bbcodes',
            'tables.bookmarks' => 'bb_bookmarks',
            'tables.bots' => 'bb_bots',
            'tables.captcha_qa_questions' => 'bb_captcha_questions',
            'tables.captcha_qa_answers' => 'bb_captcha_answers',
            'tables.captcha_qa_confirm' => 'bb_qa_confirm',
            'tables.config' => 'bb_config',
            'tables.config_text' => 'bb_config_text',
            'tables.confirm' => 'bb_confirm',
            'tables.disallow' => 'bb_disallow',
            'tables.drafts' => 'bb_drafts',
            'tables.ext' => 'bb_ext',
            'tables.extensions' => 'bb_extensions',
            'tables.extension_groups' => 'bb_extension_groups',
            'tables.forums' => 'bb_forums',
            'tables.forums_access' => 'bb_forums_access',
            'tables.forums_track' => 'bb_forums_track',
            'tables.forums_watch' => 'bb_forums_watch',
            'tables.groups' => 'bb_groups',
            'tables.icons' => 'bb_icons',
            'tables.lang' => 'bb_lang',
            'tables.log' => 'bb_log',
            'tables.login_attempts' => 'bb_login_attempts',
            'tables.migrations' => 'bb_migrations',
            'tables.moderator_cache' => 'bb_moderator_cache',
            'tables.modules' => 'bb_modules',
            'tables.notification_types' => 'bb_notification_types',
            'tables.notifications' => 'bb_notifications',
            'tables.poll_options' => 'bb_poll_options',
            'tables.poll_votes' => 'bb_poll_votes',
            'tables.posts' => 'bb_posts',
            'tables.privmsgs' => 'bb_privmsgs',
            'tables.privmsgs_folder' => 'bb_privmsgs_folder',
            'tables.privmsgs_rules' => 'bb_privmsgs_rules',
            'tables.privmsgs_to' => 'bb_privmsgs_to',
            'tables.profile_fields' => 'bb_profile_fields',
            'tables.profile_fields_data' => 'bb_profile_fields_data',
            'tables.profile_fields_options_language' => 'bb_profile_fields_lang',
            'tables.profile_fields_language' => 'bb_profile_lang',
            'tables.ranks' => 'bb_ranks',
            'tables.reports' => 'bb_reports',
            'tables.reports_reasons' => 'bb_reports_reasons',
            'tables.search_results' => 'bb_search_results',
            'tables.search_wordlist' => 'bb_search_wordlist',
            'tables.search_wordmatch' => 'bb_search_wordmatch',
            'tables.sessions' => 'bb_sessions',
            'tables.sessions_keys' => 'bb_sessions_keys',
            'tables.sitelist' => 'bb_sitelist',
            'tables.smilies' => 'bb_smilies',
            'tables.sphinx' => 'bb_sphinx',
            'tables.styles' => 'bb_styles',
            'tables.styles_template' => 'bb_styles_template',
            'tables.styles_template_data' => 'bb_styles_template_data',
            'tables.styles_theme' => 'bb_styles_theme',
            'tables.styles_imageset' => 'bb_styles_imageset',
            'tables.styles_imageset_data' => 'bb_styles_imageset_data',
            'tables.teampage' => 'bb_teampage',
            'tables.topics' => 'bb_topics',
            'tables.topics_posted' => 'bb_topics_posted',
            'tables.topics_track' => 'bb_topics_track',
            'tables.topics_watch' => 'bb_topics_watch',
            'tables.user_group' => 'bb_user_group',
            'tables.user_notifications' => 'bb_user_notifications',
            'tables.users' => 'bb_users',
            'tables.warnings' => 'bb_warnings',
            'tables.words' => 'bb_words',
            'tables.zebra' => 'bb_zebra',
            'core.disable_super_globals' => true,
            'datetime.class' => '\\phpbb\\datetime',
            'mimetype.guesser.priority.lowest' => -2,
            'mimetype.guesser.priority.low' => -1,
            'mimetype.guesser.priority.default' => 0,
            'mimetype.guesser.priority.high' => 1,
            'mimetype.guesser.priority.highest' => 2,
            'passwords.algorithms' => array(
                0 => 'passwords.driver.bcrypt_2y',
                1 => 'passwords.driver.bcrypt',
                2 => 'passwords.driver.salted_md5',
                3 => 'passwords.driver.phpass',
            ),
            'debug.exceptions' => false,
            'core.adm_relative_path' => 'adm/',
            'core.table_prefix' => 'bb_',
            'cache.driver.class' => 'phpbb\\cache\\driver\\file',
            'dbal.new_link' => false,
        );
    }
}

class phpbbtemplatetwiglexer_00000000241ef4950000000021958d0d extends \phpbb\template\twig\lexer implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolder59ff3ed73c25b623764639 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer59ff3ed73c265256520099 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties59ff3ed73c23f610240619 = array(
        
    );

    /**
     * {@inheritDoc}
     */
    public function set_environment(\Twig_Environment $env)
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, 'set_environment', array('env' => $env), $this->initializer59ff3ed73c265256520099);

        return $this->valueHolder59ff3ed73c25b623764639->set_environment($env);
    }

    /**
     * {@inheritDoc}
     */
    public function tokenize($code, $filename = null)
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, 'tokenize', array('code' => $code, 'filename' => $filename), $this->initializer59ff3ed73c265256520099);

        return $this->valueHolder59ff3ed73c25b623764639->tokenize($code, $filename);
    }

    /**
     * {@inheritDoc}
     */
    public function fix_begin_tokens($code, $parent_nodes = array())
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, 'fix_begin_tokens', array('code' => $code, 'parent_nodes' => $parent_nodes), $this->initializer59ff3ed73c265256520099);

        return $this->valueHolder59ff3ed73c25b623764639->fix_begin_tokens($code, $parent_nodes);
    }

    /**
     * @override constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public function __construct($initializer)
    {
        $this->initializer59ff3ed73c265256520099 = $initializer;
    }

    /**
     * @param string $name
     */
    public function & __get($name)
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, '__get', array('name' => $name), $this->initializer59ff3ed73c265256520099);

        if (isset(self::$publicProperties59ff3ed73c23f610240619[$name])) {
            return $this->valueHolder59ff3ed73c25b623764639->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder59ff3ed73c25b623764639;

            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }

        $targetObject = $this->valueHolder59ff3ed73c25b623764639;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer59ff3ed73c265256520099);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder59ff3ed73c25b623764639;

            return $targetObject->$name = $value;;
            return;
        }

        $targetObject = $this->valueHolder59ff3ed73c25b623764639;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __isset($name)
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, '__isset', array('name' => $name), $this->initializer59ff3ed73c265256520099);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder59ff3ed73c25b623764639;

            return isset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder59ff3ed73c25b623764639;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __unset($name)
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, '__unset', array('name' => $name), $this->initializer59ff3ed73c265256520099);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder59ff3ed73c25b623764639;

            unset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder59ff3ed73c25b623764639;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __clone()
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, '__clone', array(), $this->initializer59ff3ed73c265256520099);

        $this->valueHolder59ff3ed73c25b623764639 = clone $this->valueHolder59ff3ed73c25b623764639;
    }

    public function __sleep()
    {
        $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, '__sleep', array(), $this->initializer59ff3ed73c265256520099);

        return array('valueHolder59ff3ed73c25b623764639');
    }

    public function __wakeup()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer59ff3ed73c265256520099 = $initializer;
    }

    /**
     * {@inheritDoc}
     */
    public function getProxyInitializer()
    {
        return $this->initializer59ff3ed73c265256520099;
    }

    /**
     * {@inheritDoc}
     */
    public function initializeProxy()
    {
        return $this->initializer59ff3ed73c265256520099 && $this->initializer59ff3ed73c265256520099->__invoke($this->valueHolder59ff3ed73c25b623764639, $this, 'initializeProxy', array(), $this->initializer59ff3ed73c265256520099);
    }

    /**
     * {@inheritDoc}
     */
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder59ff3ed73c25b623764639;
    }

    /**
     * {@inheritDoc}
     */
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder59ff3ed73c25b623764639;
    }


}
