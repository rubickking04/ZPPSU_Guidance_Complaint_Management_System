SELECT
YEAR(created_at) AS year,
MONTHNAME(created_at) AS month,
count(*) published
FROM users;
GROUP BY YEAR,MONTH
