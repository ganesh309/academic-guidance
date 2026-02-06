<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks to avoid ordering issues during truncation/seeding
        Schema::disableForeignKeyConstraints();

        // 1. Independent Reference Tables
        DB::table('academics')->truncate();
        DB::table('academics')->insert([
            ['id' => 1, 'name' => 'Undergraduate Programmes'],
            ['id' => 2, 'name' => 'Postgraduate Programmes'],
            ['id' => 3, 'name' => 'Ph.D Programmes'],
        ]);

        DB::table('batches')->truncate();
        DB::table('batches')->insert([
            ['id' => 1, 'name' => '2020-2024'],
            ['id' => 2, 'name' => '2021-2025'],
            ['id' => 3, 'name' => '2022-2026'],
            ['id' => 4, 'name' => '2023-2027'],
        ]);

        DB::table('genders')->truncate();
        DB::table('genders')->insert([
            ['id' => 1, 'name' => 'Female'],
            ['id' => 2, 'name' => 'Male'],
            ['id' => 3, 'name' => 'Others'],
        ]);

        DB::table('semesters')->truncate();
        DB::table('semesters')->insert([
            ['id' => 1, 'name' => '1st'],
            ['id' => 2, 'name' => '2nd'],
            ['id' => 3, 'name' => '3rd'],
            ['id' => 4, 'name' => '4th'],
            ['id' => 5, 'name' => '5th'],
            ['id' => 6, 'name' => '6th'],
            ['id' => 7, 'name' => '7th'],
            ['id' => 8, 'name' => '8th'],
        ]);

        DB::table('countries')->truncate();
        DB::table('countries')->insert([
            ['id' => 1, 'name' => 'India'],
        ]);

        // 2. Dependent Reference Tables (States, Districts, Schools, Degrees)
        DB::table('states')->truncate();
        DB::table('states')->insert([
            ['id' => 1, 'name' => 'Andhra Pradesh', 'country_id' => 1],
            ['id' => 2, 'name' => 'Arunachal Pradesh', 'country_id' => 1],
            ['id' => 3, 'name' => 'Assam', 'country_id' => 1],
            ['id' => 4, 'name' => 'West Bengal', 'country_id' => 1],
            ['id' => 5, 'name' => 'Chhattisgarh', 'country_id' => 1],
            ['id' => 6, 'name' => 'Goa', 'country_id' => 1],
            ['id' => 7, 'name' => 'Gujarat', 'country_id' => 1],
            ['id' => 8, 'name' => 'Haryana', 'country_id' => 1],
            ['id' => 9, 'name' => 'Himachal Pradesh', 'country_id' => 1],
            ['id' => 10, 'name' => 'Jharkhand', 'country_id' => 1],
        ]);

        DB::table('districts')->truncate();
        DB::table('districts')->insert([
            ['id' => 1, 'name' => 'Anantapur', 'state_id' => 1],
            ['id' => 2, 'name' => 'Chittoor', 'state_id' => 1],
            ['id' => 3, 'name' => 'East Godavari', 'state_id' => 1],
            ['id' => 4, 'name' => 'Guntur', 'state_id' => 1],
            ['id' => 5, 'name' => 'Kadapa', 'state_id' => 1],
            ['id' => 6, 'name' => 'Krishna', 'state_id' => 1],
            ['id' => 7, 'name' => 'Kurnool', 'state_id' => 1],
            ['id' => 8, 'name' => 'Nellore', 'state_id' => 1],
            ['id' => 9, 'name' => 'Prakasam', 'state_id' => 1],
            ['id' => 10, 'name' => 'Srikakulam', 'state_id' => 1],
            ['id' => 11, 'name' => 'Tawang', 'state_id' => 2],
            ['id' => 12, 'name' => 'West Kameng', 'state_id' => 2],
            ['id' => 13, 'name' => 'East Kameng', 'state_id' => 2],
            ['id' => 14, 'name' => 'Papum Pare', 'state_id' => 2],
            ['id' => 15, 'name' => 'Kurung Kumey', 'state_id' => 2],
            ['id' => 16, 'name' => 'Lower Subansiri', 'state_id' => 2],
            ['id' => 17, 'name' => 'Upper Subansiri', 'state_id' => 2],
            ['id' => 18, 'name' => 'West Siang', 'state_id' => 2],
            ['id' => 19, 'name' => 'East Siang', 'state_id' => 2],
            ['id' => 20, 'name' => 'Dibang Valley', 'state_id' => 2],
            ['id' => 21, 'name' => 'Baksa', 'state_id' => 3],
            ['id' => 22, 'name' => 'Barpeta', 'state_id' => 3],
            ['id' => 23, 'name' => 'Biswanath', 'state_id' => 3],
            ['id' => 24, 'name' => 'Bongaigaon', 'state_id' => 3],
            ['id' => 25, 'name' => 'Cachar', 'state_id' => 3],
            ['id' => 26, 'name' => 'Charaideo', 'state_id' => 3],
            ['id' => 27, 'name' => 'Darrang', 'state_id' => 3],
            ['id' => 28, 'name' => 'Dhemaji', 'state_id' => 3],
            ['id' => 29, 'name' => 'Dhubri', 'state_id' => 3],
            ['id' => 30, 'name' => 'Dibrugarh', 'state_id' => 3],
            ['id' => 31, 'name' => 'Alipurduar', 'state_id' => 4],
            ['id' => 32, 'name' => 'South 24 pgs', 'state_id' => 4],
            ['id' => 33, 'name' => 'East Medinipur', 'state_id' => 4],
            ['id' => 34, 'name' => 'Kolkata', 'state_id' => 4],
            ['id' => 35, 'name' => 'Dakshin Dinajpur', 'state_id' => 4],
            ['id' => 36, 'name' => 'Darjeeling', 'state_id' => 4],
            ['id' => 37, 'name' => 'Hooghly', 'state_id' => 4],
            ['id' => 38, 'name' => 'Howrah', 'state_id' => 4],
            ['id' => 39, 'name' => 'Jalpaiguri', 'state_id' => 4],
            ['id' => 40, 'name' => 'West Medinipur', 'state_id' => 4],
            ['id' => 41, 'name' => 'Balod', 'state_id' => 5],
            ['id' => 42, 'name' => 'Baloda Bazar', 'state_id' => 5],
            ['id' => 43, 'name' => 'Balrampur', 'state_id' => 5],
            ['id' => 44, 'name' => 'Bastar', 'state_id' => 5],
            ['id' => 45, 'name' => 'Bemetara', 'state_id' => 5],
            ['id' => 46, 'name' => 'Bijapur', 'state_id' => 5],
            ['id' => 47, 'name' => 'Bilaspur', 'state_id' => 5],
            ['id' => 48, 'name' => 'Dantewada', 'state_id' => 5],
            ['id' => 49, 'name' => 'Dhamtari', 'state_id' => 5],
            ['id' => 50, 'name' => 'Durg', 'state_id' => 5],
            ['id' => 51, 'name' => 'North Goa', 'state_id' => 6],
            ['id' => 52, 'name' => 'South Goa', 'state_id' => 6],
            ['id' => 53, 'name' => 'Ponda', 'state_id' => 6],
            ['id' => 54, 'name' => 'Mormugao', 'state_id' => 6],
            ['id' => 55, 'name' => 'Bicholim', 'state_id' => 6],
            ['id' => 56, 'name' => 'Sattari', 'state_id' => 6],
            ['id' => 57, 'name' => 'Dharbandora', 'state_id' => 6],
            ['id' => 58, 'name' => 'Canacona', 'state_id' => 6],
            ['id' => 59, 'name' => 'Pernem', 'state_id' => 6],
            ['id' => 60, 'name' => 'Salcete', 'state_id' => 6],
            ['id' => 61, 'name' => 'Ahmedabad', 'state_id' => 7],
            ['id' => 62, 'name' => 'Amreli', 'state_id' => 7],
            ['id' => 63, 'name' => 'Anand', 'state_id' => 7],
            ['id' => 64, 'name' => 'Aravalli', 'state_id' => 7],
            ['id' => 65, 'name' => 'Banaskantha', 'state_id' => 7],
            ['id' => 66, 'name' => 'Bharuch', 'state_id' => 7],
            ['id' => 67, 'name' => 'Bhavnagar', 'state_id' => 7],
            ['id' => 68, 'name' => 'Botad', 'state_id' => 7],
            ['id' => 69, 'name' => 'Chhota Udaipur', 'state_id' => 7],
            ['id' => 70, 'name' => 'Dahod', 'state_id' => 7],
            ['id' => 71, 'name' => 'Ambala', 'state_id' => 8],
            ['id' => 72, 'name' => 'Bhiwani', 'state_id' => 8],
            ['id' => 73, 'name' => 'Charkhi Dadri', 'state_id' => 8],
            ['id' => 74, 'name' => 'Faridabad', 'state_id' => 8],
            ['id' => 75, 'name' => 'Fatehabad', 'state_id' => 8],
            ['id' => 76, 'name' => 'Gurugram', 'state_id' => 8],
            ['id' => 77, 'name' => 'Hisar', 'state_id' => 8],
            ['id' => 78, 'name' => 'Jhajjar', 'state_id' => 8],
            ['id' => 79, 'name' => 'Jind', 'state_id' => 8],
            ['id' => 80, 'name' => 'Kaithal', 'state_id' => 8],
            ['id' => 81, 'name' => 'Bilaspur', 'state_id' => 9],
            ['id' => 82, 'name' => 'Chamba', 'state_id' => 9],
            ['id' => 83, 'name' => 'Hamirpur', 'state_id' => 9],
            ['id' => 84, 'name' => 'Kangra', 'state_id' => 9],
            ['id' => 85, 'name' => 'Kinnaur', 'state_id' => 9],
            ['id' => 86, 'name' => 'Kullu', 'state_id' => 9],
            ['id' => 87, 'name' => 'Lahaul and Spiti', 'state_id' => 9],
            ['id' => 88, 'name' => 'Mandi', 'state_id' => 9],
            ['id' => 89, 'name' => 'Shimla', 'state_id' => 9],
            ['id' => 90, 'name' => 'Sirmaur', 'state_id' => 9],
            ['id' => 91, 'name' => 'Bokaro', 'state_id' => 10],
            ['id' => 92, 'name' => 'Chatra', 'state_id' => 10],
            ['id' => 93, 'name' => 'Deoghar', 'state_id' => 10],
            ['id' => 94, 'name' => 'Dhanbad', 'state_id' => 10],
            ['id' => 95, 'name' => 'Dumka', 'state_id' => 10],
            ['id' => 96, 'name' => 'East Singhbhum', 'state_id' => 10],
            ['id' => 97, 'name' => 'Garhwa', 'state_id' => 10],
            ['id' => 98, 'name' => 'Giridih', 'state_id' => 10],
            ['id' => 99, 'name' => 'Godda', 'state_id' => 10],
            ['id' => 100, 'name' => 'Gumla', 'state_id' => 10],
        ]);

        DB::table('schools')->truncate();
        DB::table('schools')->insert([
            ['id' => 1, 'name' => 'School of Science & Technology', 'academic_id' => 1],
            ['id' => 2, 'name' => 'School of Maritime Studies', 'academic_id' => 1],
            ['id' => 3, 'name' => 'School Of Agriculture & Allied Sciences', 'academic_id' => 1],
            ['id' => 4, 'name' => 'School of Health Sciences', 'academic_id' => 1],
            ['id' => 5, 'name' => 'School of Pharmacy', 'academic_id' => 1],
            ['id' => 6, 'name' => 'School Of Humanities, Management & Social Sciences', 'academic_id' => 1],
            ['id' => 7, 'name' => 'Institute of Nursing', 'academic_id' => 1],
            ['id' => 8, 'name' => 'School of Hospitality and Culinary Art', 'academic_id' => 1],
            ['id' => 9, 'name' => 'School of Legal Studies', 'academic_id' => 1],
            ['id' => 10, 'name' => 'B.Voc', 'academic_id' => 1],
            ['id' => 11, 'name' => 'School of Science & Technology', 'academic_id' => 2],
            ['id' => 12, 'name' => 'School of Health Sciences', 'academic_id' => 2],
            ['id' => 13, 'name' => 'School of Pharmacy', 'academic_id' => 2],
            ['id' => 14, 'name' => 'School Of Humanities, Management & Social Sciences', 'academic_id' => 2],
            ['id' => 15, 'name' => 'School of Science & Technology', 'academic_id' => 3],
            ['id' => 16, 'name' => 'School Of Agriculture & Allied Sciences', 'academic_id' => 3],
            ['id' => 17, 'name' => 'School of Health Sciences', 'academic_id' => 3],
            ['id' => 18, 'name' => 'School of Pharmacy', 'academic_id' => 3],
            ['id' => 19, 'name' => 'School Of Humanities, Management & Social Sciences', 'academic_id' => 3],
        ]);

        DB::table('degrees')->truncate();
        DB::table('degrees')->insert([
            ['id' => 1, 'name' => 'B.Tech in Robotics and Automation', 'school_id' => 1],
            ['id' => 2, 'name' => 'B.Tech in CSE (Cyber Security)', 'school_id' => 1],
            ['id' => 3, 'name' => 'B.Tech in CSE (Data Science)', 'school_id' => 1],
            ['id' => 4, 'name' => 'B.Tech in CSE (AI & ML)', 'school_id' => 1],
            ['id' => 5, 'name' => 'Bachelor of Computer Application (BCA)', 'school_id' => 1],
            ['id' => 6, 'name' => 'B.Sc. (Hons.) in Biotechnology', 'school_id' => 1],
            ['id' => 7, 'name' => 'B.Sc. (Hons.) in Microbiology', 'school_id' => 1],
            ['id' => 8, 'name' => 'B.Sc. Nursing', 'school_id' => 7],
        ]);

        DB::table('subjects')->truncate();
        DB::table('subjects')->insert([
            ['id' => 1, 'name' => 'Basic Electrical and Electronics Engineering', 'degree_id' => 2, 'semester_id' => 1],
            ['id' => 2, 'name' => 'Python', 'degree_id' => 2, 'semester_id' => 1],
            ['id' => 3, 'name' => 'Environmental Science', 'degree_id' => 2, 'semester_id' => 1],
            ['id' => 4, 'name' => 'C programming', 'degree_id' => 2, 'semester_id' => 1],
            ['id' => 5, 'name' => 'Engineering graphics and design', 'degree_id' => 2, 'semester_id' => 1],
            ['id' => 6, 'name' => 'Network Security', 'degree_id' => 2, 'semester_id' => 2],
            ['id' => 7, 'name' => 'Introduction to Cyber Security', 'degree_id' => 2, 'semester_id' => 2],
            ['id' => 8, 'name' => 'Cryptography', 'degree_id' => 2, 'semester_id' => 2],
            ['id' => 9, 'name' => 'Ethical Hacking', 'degree_id' => 2, 'semester_id' => 2],
            ['id' => 10, 'name' => 'Computer Networks', 'degree_id' => 2, 'semester_id' => 2],
            ['id' => 11, 'name' => 'Computer programming', 'degree_id' => 4, 'semester_id' => 1],
            ['id' => 12, 'name' => 'Artificial intelligence', 'degree_id' => 4, 'semester_id' => 1],
            ['id' => 13, 'name' => 'Natural language processing', 'degree_id' => 4, 'semester_id' => 1],
            ['id' => 14, 'name' => 'Deep learning', 'degree_id' => 4, 'semester_id' => 1],
            ['id' => 15, 'name' => 'Machine learning', 'degree_id' => 4, 'semester_id' => 1],
        ]);

        // 3. User Data (Admin, Faculty, Student, Mentor, Mentee)
        DB::table('admin')->truncate();
        DB::table('admin')->insert([
            ['id' => 1, 'email' => 'admin@gmail.com', 'password' => 'e86f78a8a3caf0b60d8e74e5942aa6d86dc150cd3c03338aef25b7d2d7e3acc7'],
        ]);

        DB::table('faculties')->truncate();
        DB::table('faculties')->insert([
            ['id' => 1, 'uid' => 'TNU-F-001', 'fname' => 'Dr. A.', 'lname' => 'Maity', 'email' => 'mentor@gmail.com', 'mobile' => '7585088672', 'gender_id' => 1, 'school_id' => 1, 'country_id' => 1, 'state_id' => 4, 'district_id' => 34],
            ['id' => 2, 'uid' => 'TNU-F-002', 'fname' => 'P.', 'lname' => 'Mukherjee', 'email' => 'saphuipratik09@gmail.com', 'mobile' => '9867543458', 'gender_id' => 2, 'school_id' => 1, 'country_id' => 1, 'state_id' => 1, 'district_id' => 2],
            ['id' => 3, 'uid' => 'TNU-F-003', 'fname' => 'S.', 'lname' => 'Mondal', 'email' => 'ghoraiganesh205@gmail.com', 'mobile' => '7856435678', 'gender_id' => 1, 'school_id' => 1, 'country_id' => 1, 'state_id' => 4, 'district_id' => 34],
            ['id' => 4, 'uid' => 'TNU-F-006', 'fname' => 'R.', 'lname' => 'Sarkar', 'email' => 'rajesh.maity@tnu.in', 'mobile' => '7643566545', 'gender_id' => 2, 'school_id' => 7, 'country_id' => 1, 'state_id' => 4, 'district_id' => 32],
        ]);

        DB::table('students')->truncate();
        DB::table('students')->insert([
            ['id' => 1, 'registration_no' => 'Reg20211234', 'fname' => 'Ganesh', 'lname' => 'Ghorai', 'uid' => 'TNU2021020100035', 'email' => 'testmail@gmail.com', 'mobile' => '8967228774', 'batch_id' => '1', 'semester_id' => 1, 'sgpa' => 4.99, 'gender_id' => 2, 'academic_id' => 1, 'school_id' => 1, 'degree_id' => 2, 'country_id' => 1, 'state_id' => 4, 'district_id' => 33],
            ['id' => 2, 'registration_no' => 'Reg20211243', 'fname' => 'Pratik', 'lname' => 'Saphui', 'uid' => 'TNU2021020100011', 'email' => 'pratik.saphui@tnu.in', 'mobile' => '9641929005', 'batch_id' => '1', 'semester_id' => 1, 'sgpa' => 4.47, 'gender_id' => 2, 'academic_id' => 1, 'school_id' => 1, 'degree_id' => 2, 'country_id' => 1, 'state_id' => 4, 'district_id' => 32],
            ['id' => 3, 'registration_no' => 'Reg2021357', 'fname' => 'Anupam', 'lname' => 'Bardhan', 'uid' => 'TNU2021020100036', 'email' => 'anupam.bardhan@tnu.in', 'mobile' => '8167000981', 'batch_id' => '1', 'semester_id' => 1, 'sgpa' => 3.09, 'gender_id' => 2, 'academic_id' => 1, 'school_id' => 1, 'degree_id' => 2, 'country_id' => 1, 'state_id' => 4, 'district_id' => 40],
            ['id' => 4, 'registration_no' => 'Reg2021175', 'fname' => 'Sankar', 'lname' => 'Rajak', 'uid' => 'TNU2021020100055', 'email' => 'sankar.rajak@tnu.in', 'mobile' => '9330741654', 'batch_id' => '1', 'semester_id' => 1, 'sgpa' => 3.00, 'gender_id' => 2, 'academic_id' => 1, 'school_id' => 1, 'degree_id' => 2, 'country_id' => 1, 'state_id' => 4, 'district_id' => 34],
            ['id' => 5, 'registration_no' => 'Reg20212343', 'fname' => 'Sneham', 'lname' => 'Sebak', 'uid' => 'TNU2021020100029', 'email' => 'sneham.sebak@tnu.in', 'mobile' => '8767987856', 'batch_id' => '1', 'semester_id' => 2, 'sgpa' => 5.00, 'gender_id' => 2, 'academic_id' => 1, 'school_id' => 1, 'degree_id' => 2, 'country_id' => 1, 'state_id' => 4, 'district_id' => 32],
            ['id' => 6, 'registration_no' => 'Reg2021345', 'fname' => 'Jeet', 'lname' => 'Mondal', 'uid' => 'TNU2021020100030', 'email' => 'jeet.mondal@tnu.in', 'mobile' => '7865456789', 'batch_id' => '1', 'semester_id' => 1, 'sgpa' => 4.10, 'gender_id' => 2, 'academic_id' => 1, 'school_id' => 7, 'degree_id' => 8, 'country_id' => 1, 'state_id' => 4, 'district_id' => 34],
        ]);

        DB::table('mentors')->truncate();
        DB::table('mentors')->insert([
            ['id' => 3, 'faculty_id' => 1, 'email' => 'mentor@gmail.com', 'password' => '236977126d6375b9fa5f7ec7d7d7055cf36741c990d9c788f68a8427b08cdf08', 'password_updated' => 1, 'created_at' => '2025-06-03 04:35:57', 'updated_at' => '2025-06-03 04:37:24'],
            ['id' => 4, 'faculty_id' => 2, 'email' => 'saphuipratik09@gmail.com', 'password' => '0a345aa8bcaaf04723743545ce3d65778722863d5de85f7fcb56b1a282c844a8', 'password_updated' => 0, 'created_at' => '2025-06-03 04:36:13', 'updated_at' => '2025-06-03 04:36:13'],
        ]);

        DB::table('mentees')->truncate();
        DB::table('mentees')->insert([
            ['id' => 4, 'student_id' => 1, 'email' => 'testmail@gmail.com', 'password' => 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'password_updated' => 1, 'mentor_id' => 3, 'created_at' => '2025-06-03 04:35:57', 'updated_at' => '2025-06-03 04:39:21'],
            ['id' => 5, 'student_id' => 2, 'email' => 'pratik.saphui@tnu.in', 'password' => 'b8909e9d355b9156af2d0290f5c6fe3ac35a157fface3f27f1be43c5292e7874', 'password_updated' => 0, 'mentor_id' => 3, 'created_at' => '2025-06-03 04:36:13', 'updated_at' => '2025-06-03 04:36:31'],
        ]);

        // 4. Transactional Data
        DB::table('interactions')->truncate();
        DB::table('interactions')->insert([
            ['id' => 1, 'mentee_id' => 1, 'date' => '2025-05-28', 'attendance' => 'Present', 'interaction' => 'abcd', 'problem_understood' => 'abcd', 'remedy' => 'abcde', 'observation' => 'abcd'],
            ['id' => 2, 'mentee_id' => 2, 'date' => '2025-06-03', 'attendance' => 'Present', 'interaction' => 'asdfghjkl;\'asdfghjkl', 'problem_understood' => 'asdfghjkl;\'/', 'remedy' => 'sdfghjkl;/', 'observation' => 'sdfghjkm,.'],
            ['id' => 3, 'mentee_id' => 4, 'date' => '2025-06-03', 'attendance' => 'Present', 'interaction' => 'asdfghjkl;dfghjkl', 'problem_understood' => 'sdfghjkl', 'remedy' => 'asdfghjkl', 'observation' => 'aaaaaaaaaaaaaaaaa'],
        ]);

        DB::table('attendances')->truncate();
        $attendances = [
            [1, 1, '2025-01-01', 1, 1],
            [2, 1, '2025-01-01', 2, 0],
            [3, 1, '2025-01-01', 3, 0],
            [4, 1, '2025-01-01', 4, 0],
            [5, 1, '2025-01-01', 5, 0],
            [6, 1, '2025-01-02', 1, 1],
            [7, 1, '2025-01-02', 2, 1],
            [8, 1, '2025-01-02', 3, 1],
            [9, 1, '2025-01-02', 4, 1],
            [10, 1, '2025-01-02', 5, 1],
            [11, 1, '2025-01-03', 1, 1],
            [12, 1, '2025-01-03', 2, 0],
            [13, 1, '2025-01-03', 4, 1],
            [14, 1, '2025-02-03', 1, 1],
            [15, 1, '2025-02-03', 2, 0],
            [16, 1, '2025-02-03', 3, 1],
            [17, 1, '2025-02-03', 4, 1],
            [18, 1, '2025-02-03', 5, 0],
            [19, 1, '2025-02-04', 1, 0],
            [20, 1, '2025-02-04', 2, 1],
            [21, 1, '2025-02-04', 3, 1],
            [22, 1, '2025-02-04', 4, 0],
            [23, 1, '2025-02-04', 5, 1],
            [24, 1, '2025-03-10', 1, 0],
            [25, 1, '2025-03-10', 2, 1],
            [26, 1, '2025-03-10', 3, 1],
            [27, 1, '2025-03-10', 4, 1],
            [28, 1, '2025-03-10', 5, 1],
            [29, 1, '2025-03-11', 1, 1],
            [30, 1, '2025-03-11', 2, 0],
            [31, 1, '2025-03-11', 3, 0],
            [32, 1, '2025-03-11', 4, 0],
            [33, 1, '2025-03-11', 5, 0],
            [34, 1, '2025-03-12', 1, 1],
            [35, 1, '2025-03-12', 2, 1],
            [36, 1, '2025-04-01', 1, 0],
            [37, 1, '2025-04-01', 2, 0],
            [38, 1, '2025-04-01', 3, 0],
            [39, 1, '2025-04-01', 4, 0],
            [40, 1, '2025-04-01', 5, 0],
            [41, 1, '2025-04-02', 1, 1],
            [42, 1, '2025-04-02', 2, 1],
            [43, 1, '2025-04-02', 3, 1],
            [44, 1, '2025-04-02', 4, 0],
            [45, 1, '2025-04-02', 5, 0],
            [46, 1, '2025-04-03', 1, 0],
            [47, 1, '2025-04-03', 2, 0],
            [48, 1, '2025-04-03', 3, 0],
            [49, 1, '2025-04-03', 4, 1],
            [50, 1, '2025-04-03', 5, 1],
            [51, 1, '2025-05-01', 1, 0],
            [52, 1, '2025-05-01', 2, 1],
            [53, 1, '2025-05-01', 3, 0],
            [54, 1, '2025-05-01', 4, 1],
            [55, 1, '2025-05-01', 5, 1],
        ];

        $attendanceData = [];
        foreach ($attendances as $row) {
             $attendanceData[] = [
                 'id' => $row[0],
                 'student_id' => $row[1],
                 'date' => $row[2],
                 'subject_id' => $row[3],
                 'attendance' => $row[4]
             ];
        }
        DB::table('attendances')->insert($attendanceData);

        Schema::enableForeignKeyConstraints();
    }
}
