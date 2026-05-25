<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProfile extends Model
{
    protected $fillable = [
        'site_title','nav_brand','language_label','hero_eyebrow','first_name','last_name','role_prefix','role_title',
        'hero_description','primary_button_label','primary_button_url','secondary_button_label','secondary_button_url',
        'hero_card_icon','hero_card_name','hero_card_role','hero_avatar_initials','hero_handle','hero_status','hero_contact_label',
        'about_photo','about_title','about_title_highlight','about_quote','about_paragraph_1','about_paragraph_2',
        'stat_1_number','stat_1_label','stat_2_number','stat_2_label','stat_3_number','stat_3_label','cv_label','cv_url',
        'skills_eyebrow','skills_title','projects_title','projects_subtitle','contact_eyebrow','contact_title','contact_subtitle',
        'system_status','email_label','email_value','whatsapp_label','whatsapp_value','form_title','footer_text',
    ];

    public static function current(): self
    {
        return static::query()->first() ?? static::query()->create([
            'site_title' => 'Portfolio',
            'nav_brand' => 'Portfolio',
        ]);
    }
}
