<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyJob;
use App\Models\General;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user1 = User::create([
            'email' => 'company@gmail.com',
            'password' => bcrypt('company1234'),
            'role' => 'company',
            'status' => true,
        ]);

        $user2 = User::create([
            'email' => 'umum@gmail.com',
            'password' => bcrypt('umum1234'),
            'role' => 'umum',
            'status' => true,
        ]);

        General::create([
            'user_id' => $user2->id,
            'full_name' => 'Arfan Faeza Atallah',
            'gender' => 'male',
            'birth_place' => 'Karawang',
            'birth_date' => '2001-01-01',
            'address' => 'Karawang Barat',
            'last_education' => 'SMA',
            'resume_url' => 'general/1234.pdf'
        ]);

        $company1 = Company::create([
            'user_id' => $user1->id,
            'company_name' => 'PT. XYZ',
            'company_category' => 'Food & Baverage',
            'company_description' => 'Lorem Ipsum sit dolor amet blablabalblalab',
            'company_address' => 'Jl. XYZ, No. 123, Jakarta',
            'total_employee' => '1 - 50',
        ]);

        CompanyJob::create([
            'company_id' => $company1->id,
            'job_title' => 'Fullstack Developer',
            'job_category' => 'Web Development',
            'job_type' => 'full-time',
            'job_level' => 'entry',
            'job_description' => 'Lorem Ipsum sit dolor amet blablabalblalab',
            'job_salary' => 8500000,
            'job_location' => 'remote',
            'deadline_submitted' => '2025-05-10',
            'status' => true,
        ]);

        CompanyJob::create([
            'company_id' => $company1->id,
            'job_title' => 'Frontend Web Developer',
            'job_category' => 'Web Development',
            'job_type' => 'part-time',
            'job_level' => 'entry',
            'job_description' => 'Lorem Ipsum sit dolor amet blablabalblalab',
            'job_salary' => 4000000,
            'job_location' => 'hybrid',
            'deadline_submitted' => '2025-03-05',
            'status' => true,
        ]);

        CompanyJob::create([
            'company_id' => $company1->id,
            'job_title' => 'Mobile Web Developer',
            'job_category' => 'Web Development',
            'job_type' => 'full-time',
            'job_level' => 'intermediate',
            'job_description' => 'Lorem Ipsum sit dolor amet blablabalblalab',
            'job_salary' => 4000000,
            'job_location' => 'wfo',
            'deadline_submitted' => '2025-03-05',
            'status' => true,
        ]);
    }
}
