SELECT
    user_id,
    user_name,
    user_lastname,
    user_mobile,
    user_level,
    user_shirt,
    user_school,
    size,
    level
FROM
    `users`
    RIGHT JOIN shirt ON users.user_shirt = shirt.s_id
    LEFT JOIN teacher_level ON users.user_level = teacher_level.tl_id
WHERE
    user_id = 1;