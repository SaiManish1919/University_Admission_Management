drop database university;

create database university;
use university;

create table universities(
university_id int auto_increment primary key,
university_name varchar(255) not null,
phone varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null,
address varchar(255) not null,
state varchar(255) not null,
city varchar(255) not null,
zipcode varchar(255) not null,
picture varchar(255) not null
);

create table departments(
department_id int auto_increment primary key,
department_name varchar(255) not null,
gpa varchar(255) not null,
university_id int,
foreign key(university_id) references universities(university_id)
);

create table courses(
course_id int auto_increment primary key,
course_name varchar(255) not null,
picture varchar(255) not null,
department_id int,
foreign key(department_id) references departments(department_id)
);

create table tutors(
tutor_id int auto_increment primary key,
name varchar(255) not null,
phone varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null,
address varchar(255) not null,
state varchar(255) not null,
city varchar(255) not null,
zipcode varchar(255) not null,
designation varchar(255) not null,
experience varchar(255) not null,
profile_picture varchar(255) not null,
university_id int,
foreign key(university_id) references universities(university_id)
);

create table tutor_courses(
tutor_course_id int auto_increment primary key,
tutor_course_title varchar(255) not null,
picture varchar(255) not null,
course_id int,
foreign key(course_id) references courses(course_id),
tutor_id int,
foreign key(tutor_id) references tutors(tutor_id)
);

create table course_sections(
course_section_id int auto_increment primary key,
course_section_name varchar(255) not null,
tutor_course_id int,
foreign key(tutor_course_id) references tutor_courses(tutor_course_id)
);

create table section_videos(
section_video_id int auto_increment primary key,
video_title varchar(255) not null,
video varchar(255) not null,
duration varchar(255) not null,
course_section_id int,
foreign key(course_section_id) references course_sections(course_section_id)
);

create table course_exam_questions(
course_exam_question_id int auto_increment primary key,
question_number varchar(255) not null,
question varchar(255) not null,
optionA varchar(255) not null,
optionB varchar(255) not null,
optionC varchar(255) not null,
optionD varchar(255) not null,
answer varchar(255) not null,
tutor_course_id int,
foreign key(tutor_course_id) references tutor_courses(tutor_course_id)
);


create table students(
student_id int auto_increment primary key,
first_name varchar(255) not null,
last_name varchar(255) not null,
phone varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null,
address varchar(255) not null,
state varchar(255) not null,
city varchar(255) not null,
zipcode varchar(255) not null,
image varchar(255) not null,
gpa  varchar(255) not null
);


create table qualifications(
qualification_id int auto_increment primary key,
qualification_title varchar(255) not null,
grade varchar(255) not null,
passed_year varchar(255) not null,
student_id int,
foreign key(student_id) references students(student_id)
);

create table applications(
application_id int auto_increment primary key,
date datetime default current_timestamp,
description varchar(255) not null,
status varchar(255) not null,
student_id int,
foreign key(student_id) references students(student_id),
department_id int,
foreign key(department_id) references departments(department_id)
);


create table certifications(
certification_id int auto_increment primary key,
certificate varchar(255) not null,
certificate_type varchar(255) not null,
status varchar(255) not null,
passed_year varchar(255) not null,
application_id int,
foreign key(application_id) references applications(application_id),
course_id int,
foreign key(course_id) references courses(course_id)
);

create table course_enrollments(
course_enrollment_id int auto_increment primary key,
date datetime default current_timestamp,
status varchar(255) not null default 'Enrolled',
application_id int,
foreign key(application_id) references applications(application_id),
tutor_course_id int,
foreign key(tutor_course_id) references tutor_courses(tutor_course_id)
);

create table student_answers(
student_answer_id int auto_increment primary key,
answer varchar(255) not null,
status varchar(255) not null default 'Exam Completed',
course_enrollment_id int,
foreign key(course_enrollment_id) references course_enrollments(course_enrollment_id),
course_exam_question_id int,
foreign key(course_exam_question_id) references course_exam_questions(course_exam_question_id)
);


