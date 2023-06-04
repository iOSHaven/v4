<?php

namespace Tests\Unit\Stats;

use App\Actions\Stats\RecordEvent;
use App\Models\Enums\Stats\Event;
use App\Models\Ipa;
use App\Models\Itms;
use App\Models\Stats\StatBuffer;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatBufferTest extends TestCase
{
    use RefreshDatabase;

    public RecordEvent $action;

    public function setup(): void
    {
        parent::setUp();
        $this->action = resolve(RecordEvent::class);
        Ipa::factory()->create();
        Itms::factory()->create();
        $this->travelTo(now()->startOfWeek(Carbon::SUNDAY));
    }

    public function test_it_only_creates_one_record_per_week()
    {
        $this->action->execute(Ipa::first(), Event::INSTALL, now());

        $this->travel(1)->days();
        $this->action->execute(Ipa::first(), Event::INSTALL, now());

        $this->travel(1)->days();
        $this->action->execute(Ipa::first(), Event::INSTALL, now());

        $this->assertEquals(1, StatBuffer::count());
    }

    public function test_it_can_increment_based_on_day_of_week()
    {

        $this->action->execute(Ipa::first(), Event::INSTALL, now());

        $this->travel(1)->days();
        $this->action->execute(Ipa::first(), Event::INSTALL, now(), 3);

        $this->travel(1)->days();
        $this->action->execute(Ipa::first(), Event::INSTALL, now());

        $this->assertEquals(1, StatBuffer::first()->day_1);
        $this->assertEquals(3, StatBuffer::first()->day_2);
        $this->assertEquals(1, StatBuffer::first()->day_3);
    }

    public function test_it_totals_all_7_days()
    {
        for ($i = 0; $i < 7; $i++) {
            $this->action->execute(Ipa::first(), Event::INSTALL, now(), 2);
            $this->action->execute(Ipa::first(), Event::INSTALL, now(), 2);
            $this->travel(1)->days();
        }

        $this->assertEquals(28, StatBuffer::first()->total);
    }

    public function test_it_keeps_a_running_total()
    {
        for ($i = 0; $i < 28; $i++) {
            $this->action->execute(Ipa::first(), Event::INSTALL, now());
            $this->action->execute(Ipa::first(), Event::INSTALL, now());
            $this->travel(1)->days();
        }

        $stat = StatBuffer::orderBy('created_at', 'desc')->first();
        $this->assertEquals(4, StatBuffer::count());
        $this->assertEquals(14, $stat->total);
        $this->assertEquals(14 * 4, $stat->running_total);
    }
}
