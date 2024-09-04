


CREATE TABLE "EREKOD"."PROGRAM" 
   (	"PROGRAMID" NUMBER(10,0) NOT NULL ENABLE, 
	"CLUBID" NUMBER(10,0) DEFAULT NULL, 
	"PROGRAMNAME" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"PROGRAMCATEGORYID" NUMBER(10,0) DEFAULT NULL, 
	"PENGARAHPROG" VARCHAR2(50 CHAR) DEFAULT NULL, 
	"PROGRAMLOCATION" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"STATEID" NUMBER(10,0) DEFAULT NULL, 
	"PROGRAMQUOTA" NUMBER(10,0) DEFAULT NULL, 
	"TYPEPROGRAM" VARCHAR2(50 CHAR) DEFAULT NULL, 
	"DATEAPPLY" DATE DEFAULT NULL, 
	"DATEAPPROVED"  timestamp(0) DEFAULT SYSTIMESTAMP  NULL, 
	"STARTDATE" DATE DEFAULT NULL,
  "ENDDATE" DATE DEFAULT NULL, 
	 CONSTRAINT "PROGRAM_PK" PRIMARY KEY ("PROGRAMID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "TSD_USERDB"  ENABLE, 
	 CONSTRAINT "CLUB_FK" FOREIGN KEY ("CLUBID")
	  REFERENCES "EREKOD"."CLUB" ("CLUBID") ENABLE, 
	 CONSTRAINT "PROGCAT_FK" FOREIGN KEY ("PROGRAMCATEGORYID")
	  REFERENCES "EREKOD"."PROGRAMCATEGORY" ("PROGRAMCATEGORYID") ENABLE, 
	 CONSTRAINT "PENGARAH_FK" FOREIGN KEY ("PENGARAHPROG")
	  REFERENCES "EREKOD"."STUDENT" ("STUDENTID") ENABLE, 
	 CONSTRAINT "STATEPROG_FK" FOREIGN KEY ("STATEID")
	  REFERENCES "EREKOD"."STATE" ("STATEID") ENABLE
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "TSD_USERDB" ;

  CREATE OR REPLACE TRIGGER "EREKOD"."PROGSEQ_ID" 
   before insert on "EREKOD"."PROGRAM" 
   for each row 
begin  
   if inserting then 
      if :NEW."PROGRAMID" is null then 
         select SEQ_MENU.nextval into :NEW."PROGRAMID" from dual; 
      end if; 
   end if; 
end;

/
ALTER TRIGGER "EREKOD"."PROGSEQ_ID" ENABLE;


INSERT INTO program (programID, clubID, programName, programCategoryID, startDate, pengarahProg, endDate, programLocation, stateID, programQuota, typeProgram, dateApply, dateApproved) SELECT 2, 1, 'Karnival Sukan', 7, TO_DATE('2024-11-15', 'YYYY-MM-DD'), 'S65778', TO_DATE('2024-11-18', 'YYYY-MM-DD'), 'Kompleks Sukan UMT', 13, 100, 'Terbuka', TO_DATE('2024-06-30', 'YYYY-MM-DD'), TO_DATE('2024-06-29 12:02:48', 'YYYY-MM-DD HH24:MI:SS') FROM dual UNION SELECT 4, 1, 'Pameran Kerjaya', 4, TO_DATE('2024-12-05', 'YYYY-MM-DD'), 'S65778', TO_DATE('2024-12-07', 'YYYY-MM-DD'), 'Pusat Konvensyen ', 13, 10, 'Terbuka', TO_DATE('2024-08-30', 'YYYY-MM-DD'), TO_DATE('2024-06-29 12:02:48', 'YYYY-MM-DD HH24:MI:SS') FROM dual; COMMIT;




 CREATE TABLE "EREKOD"."LAPORAN" 
   (	"LAPORANID" NUMBER(10,0) NOT NULL ENABLE, 
	"PROGRAMID" NUMBER(10,0) DEFAULT NULL, 
	"STATUSAPPROVAL" NUMBER(10,0) DEFAULT NULL, 
	"PROGRAMUMT" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"PROGRAMLUAR" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"PENCAPAIAN" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"SYOR" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"OBJEKTIF" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"COMMENT" VARCHAR2(255 CHAR) DEFAULT 'Ulasan', 
	"BANTUANKEWANGANHEPA" NUMBER(10,2) DEFAULT '0.00', 
	"DANATABUNGAMANAH" NUMBER(10,2) DEFAULT '0.00', 
	"KELULUSANKENDERAAN" VARCHAR2(255 CHAR) DEFAULT '-', 
	"KELULUSANSIJIL" NUMBER(10,0) DEFAULT '0' NOT NULL ENABLE, 
	"LAINLAINKELULUSAN" VARCHAR2(255 CHAR) DEFAULT '-', 
	"SEBABLEWAT" VARCHAR2(255 CHAR) DEFAULT NULL, 
	"DATESUBMISSION" DATE DEFAULT NULL, 
	"TOTALCOST" NUMBER(19,2) DEFAULT '0.00' NOT NULL ENABLE, 
	"REMARK" VARCHAR2(255 CHAR) DEFAULT '    ', 
	 CONSTRAINT "LAPORANID_PK" PRIMARY KEY ("LAPORANID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "TSD_USERDB"  ENABLE, 
	 CONSTRAINT "PROGID_FK" FOREIGN KEY ("PROGRAMID")
	  REFERENCES "EREKOD"."PROGRAM" ("PROGRAMID") ENABLE
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "TSD_USERDB" ;

  CREATE OR REPLACE TRIGGER "EREKOD"."LAPORANSEQ_ID" 
   before insert on "EREKOD"."LAPORAN" 
   for each row 
begin  
   if inserting then 
      if :NEW."LAPORANID" is null then 
         select SEQ_MENU.nextval into :NEW."LAPORANID" from dual; 
      end if; 
   end if; 
end;

/
ALTER TRIGGER "EREKOD"."LAPORANSEQ_ID" ENABLE;

SELECT * FROM PROGRAM;

INSERT INTO laporan (laporanID, programID, statusApproval, programUmt, programLuar, pencapaian, syor, objektif, "COMMENT", bantuanKewanganHEPA, danaTabungAmanah, kelulusanKenderaan, kelulusanSijil, lainLainKelulusan, sebabLewat, dateSubmission, totalCost, "REMARK") 
SELECT 1, 4, 3, 'pelajar UMT', 'CelcomDIgi', '-', 'dibuat pada hujung minggu', 'Pengetahuan tentang scam/buli siber secara digital', 'LULUS', '500.00', '300.00', '-', 10, 'Tiada', 'Kesibukan program bertindih tarikh dengan program yang lain', TO_DATE('2024-06-29', 'YYYY-MM-DD'), '20000.00', 'Telah disahkan dan diluluskan.' FROM dual
UNION  
SELECT 2, 1, 3, 'Penyelia SOHOR', 'YB Johor', 'Tiada', 'Tiada', 'Suai Kenal anak Johor', 'Lulus', '1500.00', '600.00', '-', 15, 'Tiada', 'Terlewat', TO_DATE('2024-07-02', 'YYYY-MM-DD'), '1030.00', ' ' FROM dual;
COMMIT;




CREATE TABLE parametersurat (
  parameterID number(10) NOT NULL,
  staffID varchar2(100 char) DEFAULT NULL,
  bagiPihak varchar2(100 char) DEFAULT NULL,
  status varchar2(20 char) DEFAULT NULL,
  dateCreate timestamp(0) DEFAULT SYSTIMESTAMP NULL
) ;



INSERT INTO parametersurat (parameterID, staffID, bagiPihak, status, dateCreate)
SELECT 1, 'A13243', 'Hal Ehwal Pelajar dan Alumni', 'Aktif', TO_DATE('2024-06-30 17:24:12', 'YYYY-MM-DD HH24:MI:SS') FROM dual
UNION 
SELECT 2, 'A14725', 'Bahagian Kewangan Hal Ehwal Pelajar', 'Aktif', TO_DATE('2024-06-30 17:24:12', 'YYYY-MM-DD HH24:MI:SS') FROM dual
UNION 
SELECT 4, 'A13243', 'Pengurusan Pentadbiran Hal Ehwal Pelajar', 'Aktif', TO_DATE('2024-06-30 18:12:47', 'YYYY-MM-DD HH24:MI:SS') FROM dual
UNION 
SELECT 6, 'A13243', 'HEPA', 'Aktif', TO_DATE('2024-07-04 03:21:38', 'YYYY-MM-DD HH24:MI:SS') FROM dual;
COMMIT;


ALTER TABLE LAPORAN
MODIFY (DATESUBMISSION TIMESTAMP DEFAULT SYSTIMESTAMP );


CREATE OR REPLACE TRIGGER update_datesubmission
BEFORE UPDATE ON LAPORAN
FOR EACH ROW
BEGIN
  IF :NEW.STATUSAPPROVAL NOT IN (3, 4) THEN
    :NEW.DATESUBMISSION := CURRENT_TIMESTAMP;
  END IF;
END;


/
CREATE TABLE kehadiran (
  kehadiranID number(10) NOT NULL,
  programID number(10) NOT NULL,
  studentID varchar2(255 char) NOT NULL,
  padam number(10) DEFAULT '0' NOT NULL
)

-- SQLINES FOR EVALUATION USE ONLY (14 DAYS)
CREATE TABLE penyertaan (
  penyertaanID number(10) NOT NULL,
  programID number(10) DEFAULT NULL,
  studentID varchar2(255 char) DEFAULT NULL,
  padam number(10) DEFAULT '0'
) 



SELECT 
    PROGRAM.*, 
    PROGRAMCATEGORY.*, 
    STATE.*, 
    CLUB.*, 
    COUNT(CASE WHEN PENYERTAAN.PADAM = 0 THEN 1 END) AS BILANGAN_PENYERTAAN
FROM 
    PROGRAM
JOIN 
    CLUB ON CLUB.CLUBID = PROGRAM.CLUBID
JOIN 
    PROGRAMCATEGORY ON PROGRAMCATEGORY.PROGRAMCATEGORYID = PROGRAM.PROGRAMCATEGORYID
JOIN 
    STATE ON STATE.STATEID = PROGRAM.STATEID
LEFT JOIN 
    PENYERTAAN ON PENYERTAAN.PROGRAMID = PROGRAM.PROGRAMID
WHERE 
    PROGRAM.PENGARAHPROG = 'S65778'
GROUP BY 
    PROGRAM.PROGRAMID
 
ORDER BY 
    PROGRAM.STARTDATE ASC;
