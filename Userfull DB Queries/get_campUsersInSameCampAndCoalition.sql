-- request only users which are no administrators
SELECT u.user_id, u.username, u.email, u.phone, r.role 
						FROM users u, campaign_users c, users_roles r
						WHERE r.role_id = u.role_id
						AND u.user_id = c.user_id
						AND u.user_id != 'userId'
						AND u.role_id != 1
						AND u.role_id != 3
						AND c.CoalID = 1
						GROUP BY u.user_id;
