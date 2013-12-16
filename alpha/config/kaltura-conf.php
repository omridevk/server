<?php
// This file generated by Propel  convert-conf target
// from XML runtime conf file C:\opt\kaltura\app\alpha\config\runtime-conf.xml
return array (
  'datasources' => 
  array (
    'kaltura' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'phptype' => 'mysql',
        'database' => 'kaltura',
        'hostspec' => 'localhost',
        'username' => 'root',
        'password' => 'root',
      ),
    ),
    'default' => 'kaltura',
  ),
  'log' => 
  array (
    'ident' => 'kaltura',
    'level' => '7',
  ),
  'generator_version' => '1.4.2',
  'classmap' => 
  array (
    'kuserTableMap' => 'lib/model/map/kuserTableMap.php',
    'kuserPeer' => 'lib/model/kuserPeer.php',
    'kuser' => 'lib/model/kuser.php',
    'kshowTableMap' => 'lib/model/map/kshowTableMap.php',
    'kshowPeer' => 'lib/model/kshowPeer.php',
    'kshow' => 'lib/model/kshow.php',
    'entryTableMap' => 'lib/model/map/entryTableMap.php',
    'entryPeer' => 'lib/model/entryPeer.php',
    'entry' => 'lib/model/entry.php',
    'LiveChannelSegmentTableMap' => 'lib/model/map/LiveChannelSegmentTableMap.php',
    'LiveChannelSegmentPeer' => 'lib/model/LiveChannelSegmentPeer.php',
    'LiveChannelSegment' => 'lib/model/LiveChannelSegment.php',
    'MediaServerTableMap' => 'lib/model/map/MediaServerTableMap.php',
    'MediaServerPeer' => 'lib/model/MediaServerPeer.php',
    'MediaServer' => 'lib/model/MediaServer.php',
    'kvoteTableMap' => 'lib/model/map/kvoteTableMap.php',
    'kvotePeer' => 'lib/model/kvotePeer.php',
    'kvote' => 'lib/model/kvote.php',
    'commentTableMap' => 'lib/model/map/commentTableMap.php',
    'commentPeer' => 'lib/model/commentPeer.php',
    'comment' => 'lib/model/comment.php',
    'flagTableMap' => 'lib/model/map/flagTableMap.php',
    'flagPeer' => 'lib/model/flagPeer.php',
    'flag' => 'lib/model/flag.php',
    'favoriteTableMap' => 'lib/model/map/favoriteTableMap.php',
    'favoritePeer' => 'lib/model/favoritePeer.php',
    'favorite' => 'lib/model/favorite.php',
    'KshowKuserTableMap' => 'lib/model/map/KshowKuserTableMap.php',
    'KshowKuserPeer' => 'lib/model/KshowKuserPeer.php',
    'KshowKuser' => 'lib/model/KshowKuser.php',
    'SchedulerTableMap' => 'lib/model/map/SchedulerTableMap.php',
    'SchedulerPeer' => 'lib/model/SchedulerPeer.php',
    'Scheduler' => 'lib/model/Scheduler.php',
    'SchedulerWorkerTableMap' => 'lib/model/map/SchedulerWorkerTableMap.php',
    'SchedulerWorkerPeer' => 'lib/model/SchedulerWorkerPeer.php',
    'SchedulerWorker' => 'lib/model/SchedulerWorker.php',
    'SchedulerStatusTableMap' => 'lib/model/map/SchedulerStatusTableMap.php',
    'SchedulerStatusPeer' => 'lib/model/SchedulerStatusPeer.php',
    'SchedulerStatus' => 'lib/model/SchedulerStatus.php',
    'SchedulerConfigTableMap' => 'lib/model/map/SchedulerConfigTableMap.php',
    'SchedulerConfigPeer' => 'lib/model/SchedulerConfigPeer.php',
    'SchedulerConfig' => 'lib/model/SchedulerConfig.php',
    'ControlPanelCommandTableMap' => 'lib/model/map/ControlPanelCommandTableMap.php',
    'ControlPanelCommandPeer' => 'lib/model/ControlPanelCommandPeer.php',
    'ControlPanelCommand' => 'lib/model/ControlPanelCommand.php',
    'BatchJobTableMap' => 'lib/model/map/BatchJobTableMap.php',
    'BatchJobPeer' => 'lib/model/BatchJobPeer.php',
    'BatchJob' => 'lib/model/BatchJob.php',
    'BatchJobLockTableMap' => 'lib/model/map/BatchJobLockTableMap.php',
    'BatchJobLockPeer' => 'lib/model/BatchJobLockPeer.php',
    'BatchJobLock' => 'lib/model/BatchJobLock.php',
    'BatchJobLockSuspendTableMap' => 'lib/model/map/BatchJobLockSuspendTableMap.php',
    'BatchJobLockSuspendPeer' => 'lib/model/BatchJobLockSuspendPeer.php',
    'BatchJobLockSuspend' => 'lib/model/BatchJobLockSuspend.php',
    'PartnerLoadTableMap' => 'lib/model/map/PartnerLoadTableMap.php',
    'PartnerLoadPeer' => 'lib/model/PartnerLoadPeer.php',
    'PartnerLoad' => 'lib/model/PartnerLoad.php',
    'PriorityGroupTableMap' => 'lib/model/map/PriorityGroupTableMap.php',
    'PriorityGroupPeer' => 'lib/model/PriorityGroupPeer.php',
    'PriorityGroup' => 'lib/model/PriorityGroup.php',
    'BulkUploadResultTableMap' => 'lib/model/map/BulkUploadResultTableMap.php',
    'BulkUploadResultPeer' => 'lib/model/BulkUploadResultPeer.php',
    'BulkUploadResult' => 'lib/model/BulkUploadResult.php',
    'blockedEmailTableMap' => 'lib/model/map/blockedEmailTableMap.php',
    'blockedEmailPeer' => 'lib/model/blockedEmailPeer.php',
    'blockedEmail' => 'lib/model/blockedEmail.php',
    'conversionTableMap' => 'lib/model/map/conversionTableMap.php',
    'conversionPeer' => 'lib/model/conversionPeer.php',
    'conversion' => 'lib/model/conversion.php',
    'flickrTokenTableMap' => 'lib/model/map/flickrTokenTableMap.php',
    'flickrTokenPeer' => 'lib/model/flickrTokenPeer.php',
    'flickrToken' => 'lib/model/flickrToken.php',
    'PuserKuserTableMap' => 'lib/model/map/PuserKuserTableMap.php',
    'PuserKuserPeer' => 'lib/model/PuserKuserPeer.php',
    'PuserKuser' => 'lib/model/PuserKuser.php',
    'PuserRoleTableMap' => 'lib/model/map/PuserRoleTableMap.php',
    'PuserRolePeer' => 'lib/model/PuserRolePeer.php',
    'PuserRole' => 'lib/model/PuserRole.php',
    'PartnerTableMap' => 'lib/model/map/PartnerTableMap.php',
    'PartnerPeer' => 'lib/model/PartnerPeer.php',
    'Partner' => 'lib/model/Partner.php',
    'WidgetLogTableMap' => 'lib/model/map/WidgetLogTableMap.php',
    'WidgetLogPeer' => 'lib/model/WidgetLogPeer.php',
    'WidgetLog' => 'lib/model/WidgetLog.php',
    'moderationTableMap' => 'lib/model/map/moderationTableMap.php',
    'moderationPeer' => 'lib/model/moderationPeer.php',
    'moderation' => 'lib/model/moderation.php',
    'moderationFlagTableMap' => 'lib/model/map/moderationFlagTableMap.php',
    'moderationFlagPeer' => 'lib/model/moderationFlagPeer.php',
    'moderationFlag' => 'lib/model/moderationFlag.php',
    'roughcutEntryTableMap' => 'lib/model/map/roughcutEntryTableMap.php',
    'roughcutEntryPeer' => 'lib/model/roughcutEntryPeer.php',
    'roughcutEntry' => 'lib/model/roughcutEntry.php',
    'widgetTableMap' => 'lib/model/map/widgetTableMap.php',
    'widgetPeer' => 'lib/model/widgetPeer.php',
    'widget' => 'lib/model/widget.php',
    'uiConfTableMap' => 'lib/model/map/uiConfTableMap.php',
    'uiConfPeer' => 'lib/model/uiConfPeer.php',
    'uiConf' => 'lib/model/uiConf.php',
    'PartnerStatsTableMap' => 'lib/model/map/PartnerStatsTableMap.php',
    'PartnerStatsPeer' => 'lib/model/PartnerStatsPeer.php',
    'PartnerStats' => 'lib/model/PartnerStats.php',
    'PartnerActivityTableMap' => 'lib/model/map/PartnerActivityTableMap.php',
    'PartnerActivityPeer' => 'lib/model/PartnerActivityPeer.php',
    'PartnerActivity' => 'lib/model/PartnerActivity.php',
    'ConversionProfileTableMap' => 'lib/model/map/ConversionProfileTableMap.php',
    'ConversionProfilePeer' => 'lib/model/ConversionProfilePeer.php',
    'ConversionProfile' => 'lib/model/ConversionProfile.php',
    'ConversionParamsTableMap' => 'lib/model/map/ConversionParamsTableMap.php',
    'ConversionParamsPeer' => 'lib/model/ConversionParamsPeer.php',
    'ConversionParams' => 'lib/model/ConversionParams.php',
    'KceInstallationErrorTableMap' => 'lib/model/map/KceInstallationErrorTableMap.php',
    'KceInstallationErrorPeer' => 'lib/model/KceInstallationErrorPeer.php',
    'KceInstallationError' => 'lib/model/KceInstallationError.php',
    'FileSyncTableMap' => 'lib/model/map/FileSyncTableMap.php',
    'FileSyncPeer' => 'lib/model/FileSyncPeer.php',
    'FileSync' => 'lib/model/FileSync.php',
    'accessControlTableMap' => 'lib/model/map/accessControlTableMap.php',
    'accessControlPeer' => 'lib/model/accessControlPeer.php',
    'accessControl' => 'lib/model/accessControl.php',
    'mediaInfoTableMap' => 'lib/model/map/mediaInfoTableMap.php',
    'mediaInfoPeer' => 'lib/model/mediaInfoPeer.php',
    'mediaInfo' => 'lib/model/mediaInfo.php',
    'assetParamsTableMap' => 'lib/model/map/assetParamsTableMap.php',
    'assetParamsPeer' => 'lib/model/assetParamsPeer.php',
    'assetParams' => 'lib/model/assetParams.php',
    'assetParamsOutputTableMap' => 'lib/model/map/assetParamsOutputTableMap.php',
    'assetParamsOutputPeer' => 'lib/model/assetParamsOutputPeer.php',
    'assetParamsOutput' => 'lib/model/assetParamsOutput.php',
    'assetTableMap' => 'lib/model/map/assetTableMap.php',
    'assetPeer' => 'lib/model/assetPeer.php',
    'asset' => 'lib/model/asset.php',
    'conversionProfile2TableMap' => 'lib/model/map/conversionProfile2TableMap.php',
    'conversionProfile2Peer' => 'lib/model/conversionProfile2Peer.php',
    'conversionProfile2' => 'lib/model/conversionProfile2.php',
    'flavorParamsConversionProfileTableMap' => 'lib/model/map/flavorParamsConversionProfileTableMap.php',
    'flavorParamsConversionProfilePeer' => 'lib/model/flavorParamsConversionProfilePeer.php',
    'flavorParamsConversionProfile' => 'lib/model/flavorParamsConversionProfile.php',
    'categoryTableMap' => 'lib/model/map/categoryTableMap.php',
    'categoryPeer' => 'lib/model/categoryPeer.php',
    'category' => 'lib/model/category.php',
    'categoryEntryTableMap' => 'lib/model/map/categoryEntryTableMap.php',
    'categoryEntryPeer' => 'lib/model/categoryEntryPeer.php',
    'categoryEntry' => 'lib/model/categoryEntry.php',
    'categoryKuserTableMap' => 'lib/model/map/categoryKuserTableMap.php',
    'categoryKuserPeer' => 'lib/model/categoryKuserPeer.php',
    'categoryKuser' => 'lib/model/categoryKuser.php',
    'syndicationFeedTableMap' => 'lib/model/map/syndicationFeedTableMap.php',
    'syndicationFeedPeer' => 'lib/model/syndicationFeedPeer.php',
    'syndicationFeed' => 'lib/model/syndicationFeed.php',
    'TrackEntryTableMap' => 'lib/model/map/TrackEntryTableMap.php',
    'TrackEntryPeer' => 'lib/model/TrackEntryPeer.php',
    'TrackEntry' => 'lib/model/TrackEntry.php',
    'SystemUserTableMap' => 'lib/model/map/SystemUserTableMap.php',
    'SystemUserPeer' => 'lib/model/SystemUserPeer.php',
    'SystemUser' => 'lib/model/SystemUser.php',
    'StorageProfileTableMap' => 'lib/model/map/StorageProfileTableMap.php',
    'StorageProfilePeer' => 'lib/model/StorageProfilePeer.php',
    'StorageProfile' => 'lib/model/StorageProfile.php',
    'EmailIngestionProfileTableMap' => 'lib/model/map/EmailIngestionProfileTableMap.php',
    'EmailIngestionProfilePeer' => 'lib/model/EmailIngestionProfilePeer.php',
    'EmailIngestionProfile' => 'lib/model/EmailIngestionProfile.php',
    'UploadTokenTableMap' => 'lib/model/map/UploadTokenTableMap.php',
    'UploadTokenPeer' => 'lib/model/UploadTokenPeer.php',
    'UploadToken' => 'lib/model/UploadToken.php',
    'invalidSessionTableMap' => 'lib/model/map/invalidSessionTableMap.php',
    'invalidSessionPeer' => 'lib/model/invalidSessionPeer.php',
    'invalidSession' => 'lib/model/invalidSession.php',
    'DynamicEnumTableMap' => 'lib/model/map/DynamicEnumTableMap.php',
    'DynamicEnumPeer' => 'lib/model/DynamicEnumPeer.php',
    'DynamicEnum' => 'lib/model/DynamicEnum.php',
    'UserLoginDataTableMap' => 'lib/model/map/UserLoginDataTableMap.php',
    'UserLoginDataPeer' => 'lib/model/UserLoginDataPeer.php',
    'UserLoginData' => 'lib/model/UserLoginData.php',
    'PermissionTableMap' => 'lib/model/map/PermissionTableMap.php',
    'PermissionPeer' => 'lib/model/PermissionPeer.php',
    'Permission' => 'lib/model/Permission.php',
    'UserRoleTableMap' => 'lib/model/map/UserRoleTableMap.php',
    'UserRolePeer' => 'lib/model/UserRolePeer.php',
    'UserRole' => 'lib/model/UserRole.php',
    'PermissionItemTableMap' => 'lib/model/map/PermissionItemTableMap.php',
    'PermissionItemPeer' => 'lib/model/PermissionItemPeer.php',
    'PermissionItem' => 'lib/model/PermissionItem.php',
    'PermissionToPermissionItemTableMap' => 'lib/model/map/PermissionToPermissionItemTableMap.php',
    'PermissionToPermissionItemPeer' => 'lib/model/PermissionToPermissionItemPeer.php',
    'PermissionToPermissionItem' => 'lib/model/PermissionToPermissionItem.php',
    'KuserToUserRoleTableMap' => 'lib/model/map/KuserToUserRoleTableMap.php',
    'KuserToUserRolePeer' => 'lib/model/KuserToUserRolePeer.php',
    'KuserToUserRole' => 'lib/model/KuserToUserRole.php',
    'ReportTableMap' => 'lib/model/map/ReportTableMap.php',
    'ReportPeer' => 'lib/model/ReportPeer.php',
    'Report' => 'lib/model/Report.php',
    'ApiServerTableMap' => 'lib/model/map/ApiServerTableMap.php',
    'ApiServerPeer' => 'lib/model/ApiServerPeer.php',
    'ApiServer' => 'lib/model/ApiServer.php',
    'BatchJobLogTableMap' => 'lib/model/map/BatchJobLogTableMap.php',
    'BatchJobLogPeer' => 'lib/model/BatchJobLogPeer.php',
    'BatchJobLog' => 'lib/model/BatchJobLog.php',
    'FileAssetTableMap' => 'lib/model/map/FileAssetTableMap.php',
    'FileAssetPeer' => 'lib/model/FileAssetPeer.php',
    'FileAsset' => 'lib/model/FileAsset.php',
  ),
);