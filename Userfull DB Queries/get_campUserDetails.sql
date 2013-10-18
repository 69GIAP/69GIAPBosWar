/* This query gets all campaign critical information of the registered users */
SELECT u.user_id, u.username, z.role, c.camp_db, r.Coalitionname, c.groupFile_path 
FROM users u
LEFT JOIN boswar_db.campaign_users c
ON u.user_id = c.user_id
LEFT JOIN rof_coalitions r
ON c.CoalID = r.CoalID
LEFT JOIN campaign_users_roles z
ON u.role_id = z.id
ORDER BY u.user_id;