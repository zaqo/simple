SELECT BG,SUM(AMOUNT) FROM
    (SELECT BG,SUM(AMOUNT) as balance FROM acceptor
       UNION ALL
    SELECT BG,- SUM(AMOUNT) as disbalance FROM donor
   )
  GROUP BY BG
  
  SELECT acceptor.BG,SUM(acceptor.AMOUNT) as balance FROM acceptor 
UNION ALL
SELECT donor.BG,- SUM(donor.AMOUNT) as disbalance FROM donor


GROUP BY BG

-- got two columns right
SELECT DISTINCT acceptor.BG AS s0,
	(SELECT SUM(acceptor.AMOUNT) FROM acceptor WHERE acceptor.BG=s0) s1,
 
(SELECT -SUM(donor.AMOUNT)
   FROM donor
   WHERE acceptor.BG = donor.BG) s2
FROM acceptor;
--
SELECT DISTINCT acceptor.BG,
        
         SUM(acceptor.AMOUNT) AS demand,
         SUM(donor.AMOUNT) AS supply,
 
         ( SUM(acceptor.AMOUNT)- SUM(donor.AMOUNT)) AS delta
FROM     acceptor INNER JOIN
         donor ON acceptor.BG = donor.BG

GROUP BY acceptor.BG,donor.BG
--------
select a.BG, (d.totalamount-a.totalamount) AS delta from
(select BG , SUM(AMOUNT) totalamount FROM acceptor group by BG) a
left JOIN
(select BG AS b, SUM(AMOUNT) totalamount  FROM donor group by BG) d on d.b=a.BG
WHERE (d.totalamount-a.totalamount) >0