# Stenka 12/11/13 updated to include newly created tables
# Tushka Nov 12, 2013 updated to use object_roles.sql instead of rof_object_roles.sql
# and to add bos_coalitions.sql, bos_countries.sql, bos_object_properties.sql
# and drop inbox.sql
# stenka 17/11/13 rebuilt to match key points
# tushka Nov 24, 2013 added static_groups.sql
# stenka 13/12/13 added columns
# stenka 22/4/14 change of ststic table to statics
# stenka 27/4/14 add trains
# stenka 5/8/14 rem planes on field and col_10 I think they are obselete

drop database boswar_db;
create database boswar_db;
use boswar_db;
source c:/Abyss web server/htdocs/global sql/boswar_db.sql;
source c:/Abyss web server/htdocs/global sql/airfields.sql;
source c:/Abyss web server/htdocs/global sql/airfields_models.sql;
source c:/Abyss web server/htdocs/global sql/bos_coalitions.sql;
source c:/Abyss web server/htdocs/global sql/bos_countries.sql;
source c:/Abyss web server/htdocs/global sql/bos_object_properties.sql;
source c:/Abyss web server/htdocs/global sql/bos_stalingrad_locations.sql;
source c:/Abyss web server/htdocs/global sql/bridges.sql;
source c:/Abyss web server/htdocs/global sql/campaign_missions.sql;
source c:/Abyss web server/htdocs/global sql/campaign_settings.sql;
source c:/Abyss web server/htdocs/global sql/campaign_status.sql;
source c:/Abyss web server/htdocs/global sql/campaign_users.sql;
source c:/Abyss web server/htdocs/global sql/columns.sql;
source c:/Abyss web server/htdocs/global sql/create_boswar_hq_user.sql;
source c:/Abyss web server/htdocs/global sql/create_rofwar_campaign_user.sql;
source c:/Abyss web server/htdocs/global sql/gunner_scores.sql;
source c:/Abyss web server/htdocs/global sql/key_points.sql;
source c:/Abyss web server/htdocs/global sql/kills.sql;
source c:/Abyss web server/htdocs/global sql/maps.sql;
source c:/Abyss web server/htdocs/global sql/mission_status.sql;
source c:/Abyss web server/htdocs/global sql/object_roles.sql;
source c:/Abyss web server/htdocs/global sql/pilot_scores.sql;
source c:/Abyss web server/htdocs/global sql/player_fate.sql;
source c:/Abyss web server/htdocs/global sql/player_health.sql;
source c:/Abyss web server/htdocs/global sql/rof_channel_locations.sql;
source c:/Abyss web server/htdocs/global sql/rof_coalitions.sql;
source c:/Abyss web server/htdocs/global sql/rof_countries.sql;
source c:/Abyss web server/htdocs/global sql/rof_lake_locations.sql;
source c:/Abyss web server/htdocs/global sql/rof_object_properties.sql;
source c:/Abyss web server/htdocs/global sql/rof_verdun_locations.sql;
source c:/Abyss web server/htdocs/global sql/rof_westernfront_locations.sql;
source c:/Abyss web server/htdocs/global sql/spawn_position.sql;
source c:/Abyss web server/htdocs/global sql/static_groups.sql;
source c:/Abyss web server/htdocs/global sql/statistics_test.sql;
#source c:/Abyss web server/htdocs/global sql/tabcreate_col_10.sql;
#source c:/Abyss web server/htdocs/global sql/tabcreate_Planes_on_field.sql;
source c:/Abyss web server/htdocs/global sql/tabcreate_statics.sql;
source c:/Abyss web server/htdocs/global sql/users.sql;
source c:/Abyss web server/htdocs/global sql/users_roles.sql;
source c:/Abyss web server/htdocs/global sql/version.sql;
source c:/Abyss web server/htdocs/global sql/trains.sql;
source c:/Abyss web server/htdocs/global sql/post_mortem.sql;
source c:/Abyss web server/htdocs/global sql/statics.sql;
source c:/Abyss web server/htdocs/global sql/airfields_points.sql;
show databases;








