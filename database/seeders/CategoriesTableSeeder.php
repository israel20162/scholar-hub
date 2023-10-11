<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Sciences' => ['Biology', 'Chemistry', 'Physics', 'Environmental Science'],
            'Mathematics' => ['Algebra', 'Geometry', 'Calculus', 'Statistics'],
            'Humanities' => ['History', 'Geography', 'Philosophy', 'Literature'],
            'Social Sciences' => ['Psychology', 'Sociology', 'Political Science', 'Economics'],
            'Arts' => ['Visual Arts', 'Music', 'Theatre and Drama', 'Dance'],
            'Languages' => ['English', 'Spanish', 'French', 'Mandarin'],
            'Computer & Information Sciences' => ['Programming & Coding', 'Data Science', 'Cybersecurity', 'Artificial Intelligence'],
            'Engineering' => ['Mechanical Engineering', 'Electrical Engineering', 'Civil Engineering', 'Chemical Engineering'],
            'Business & Commerce' => ['Marketing', 'Finance', 'Entrepreneurship', 'Human Resources'],
            'Health & Medicine' => ['Anatomy & Physiology', 'Public Health', 'Pharmacy', 'Nursing'],
            'General' => ['Study Tips & Tricks', 'Extracurricular Activities', 'Career Guidance', 'University & College Life', 'Technology & Gadgets', 'Book Reviews', 'Current Events', 'Travel & Exploration', 'Hobbies & Interests', 'Personal Development & Wellbeing']
        ];
        foreach ($categories as $group => $subcategories) {
            foreach ($subcategories as $categoryName) {
                Category::create([
                    'name' => $categoryName,
                  //  'group' => $group // If you're not using groups, you can remove this line.
                ]);
            }
        }
        //
    }
}
