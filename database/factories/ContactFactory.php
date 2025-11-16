<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        $status = $this->faker->randomElement(['new', 'read', 'replied', 'archived']);
        $readAt = in_array($status, ['read', 'replied']) ? $this->faker->dateTimeBetween('-30 days', 'now') : null;
        $repliedAt = $status === 'replied' ? $this->faker->dateTimeBetween('-30 days', 'now') : null;

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'company' => $this->faker->company(),
            'subject' => $this->faker->sentence(6),
            'message' => $this->faker->paragraph(3),
            'status' => $status,
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
            'metadata' => [
                'utm_source' => $this->faker->word(),
                'utm_campaign' => $this->faker->word(),
            ],
            'read_at' => $readAt,
            'replied_at' => $repliedAt,
        ];
    }
}