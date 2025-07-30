CREATE TABLE "student" (
  "id" integer PRIMARY KEY,
  "name" varchar,
  "email" varchar,
  "phone" varchar,
  "studentid" varchar,
  "photo" varchar,
  "address" varchar,
  "createdAt" datetime,
  "updateAt" datetime
);

CREATE TABLE "book" (
  "id" integer PRIMARY KEY,
  "title" varchar,
  "author" varchar,
  "cover" varchar,
  "isbn" int UNIQUE,
  "copies" int DEFAULT 1,
  "available_copy" int,
  "createAt" datetime,
  "updateAt" datetime
);

CREATE TABLE "borrowing" (
  "id" integer PRIMARY KEY,
  "student_id" int,
  "book_id" int,
  "issue_date" datetime,
  "return_date" datetime,
  "status" varchar DEFAULT 'pending',
  "createdAt" datetime,
  "updateAt" datetime
);

CREATE TABLE "reservation" (
  "int" integer PRIMARY KEY,
  "student_id" int,
  "book_id" int,
  "borrowing_id" int,
  "status" varchar DEFAULT 'pending',
  "createdAt" datetime,
  "updateAt" datetime
);

ALTER TABLE "student" ADD CONSTRAINT "borrowing" FOREIGN KEY ("id") REFERENCES "borrowing" ("student_id");

ALTER TABLE "book" ADD CONSTRAINT "borrowing" FOREIGN KEY ("id") REFERENCES "borrowing" ("book_id");

ALTER TABLE "borrowing" ADD CONSTRAINT "reservation" FOREIGN KEY ("id") REFERENCES "reservation" ("borrowing_id");
