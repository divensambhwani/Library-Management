INSERT INTO ARTICLE (AUTHOR_ID,VOLUME_NO,MAGAZINE_ID,TITLE,PAGE_NO) 
SELECT B.AUTHOR_ID,A.VOLUME_NO,C.MAGAZINE_ID,A.TITLE,A.PAGE_NO
FROM ARTICLE_temp A
JOIN AUTHOR B
ON A.AUTHOR_NAME=B.author_name
INNER JOIN MAGAZINE C
ON A.MAGAZINE_NAME=C.name