<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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
        return [
            //
        ];
    }
}
