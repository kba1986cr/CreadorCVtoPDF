namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'address',
        'phone',
        'email',
        'linkedin',
        'portfolio',
        'objective',
        'profile',
        'work_experience',
        'education',
        'skills',
        'languages',
        'certifications',
        'projects',
        'achievements',
        'references',
        'additional_info',
    ];

    protected $casts = [
        'work_experience' => 'array',
        'education' => 'array',
        'skills' => 'array',
        'languages' => 'array',
        'certifications' => 'array',
        'projects' => 'array',
        'achievements' => 'array',
        'references' => 'array',
        'additional_info' => 'array',
    ];

    /**
     * Relación con el usuario propietario del CV.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
