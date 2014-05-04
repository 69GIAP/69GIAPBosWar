# Stenka 12/11/13 updated to include newly created tables
# Tushka Nov 12, 2013 updated to use object_roles.sql instead of rof_object_roles.sql
# and to add bos_coalitions.sql, bos_countries.sql, bos_object_properties.sql
# and drop inbox.sql
# stenka 17/11/13 rebuilt to match key points
# tushka Nov 24, 2013 added static_groups.sql
# stenka 13/12/13 added columns
# stenka 22/4/14 change of ststic table to statics
# stenka 27/4/14 add trains

drop database boswar_db;
create database boswar_db;
use boswar_db;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/boswar_db.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/airfields.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/airfields_models.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/bos_coalitions.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/bos_countries.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/bos_object_properties.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/bos_stalingrad_locations.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/bridges.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/campaign_missions.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/campaign_settings.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/campaign_status.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/campaign_users.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/columns.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/create_boswar_hq_user.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/create_rofwar_campaign_user.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/gunner_scores.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/key_points.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/kills.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/maps.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/mission_status.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/object_roles.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/pilot_scores.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/player_fate.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/player_health.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/rof_channel_locations.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/rof_coalitions.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/rof_countries.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/rof_lake_locations.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/rof_object_properties.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/rof_verdun_locations.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/rof_westernfront_locations.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/static_groups.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/statistics_test.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/tabcreate_col_10.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/tabcreate_Planes_on_field.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/tabcreate_statics.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/users.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/users_roles.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/version.sql;
source G:/Websites/GitHub/69GIAPBosWar/Global SQL/trains.sql;
show databases;








