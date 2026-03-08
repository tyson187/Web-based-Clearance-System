use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id('department_id');
            $table->string('department_name');
            $table->string('department_email')->nullable();

            $table->softDeletes(); // deleted_at
            $table->timestamps();  // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};