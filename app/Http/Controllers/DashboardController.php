<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\DocumentForm;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;
use Rap2hpoutre\FastExcel\FastExcel;

class DashboardController extends Controller
{
    public function show() {
        //Today
        $nDemandsToday = DocumentForm::whereDate('created_at', now())->count();
        $nPaymentsToday = Demand::whereDate('created_at', now())->where('transaction_id', '!=', null)->count();
        $nMeetingsToday = Meeting::whereDate('meeting_date', now())->count();

        //Week
        $now = Carbon::now();
        $weekStart = $now->subDays($now->dayOfWeek)->setTime(0, 0);
        $nDemandsWeek = DocumentForm::whereDate('created_at', '>=', $weekStart)->count();
        $nPaymentsWeek = Demand::whereDate('created_at', '>=', $weekStart)->where('transaction_id', '!=', null)->count();
        $nMeetingsWeek = Meeting::whereDate('meeting_date', '>=', $weekStart)->count();

        //Month
        $nDemandsMonth = DocumentForm::whereMonth('created_at', Carbon::now()->month)->count();
        $nPaymentsMonth = Demand::whereMonth('created_at', Carbon::now()->month)->where('transaction_id', '!=', null)->count();
        $nMeetingsMonth = Meeting::whereMonth('meeting_date', Carbon::now()->month)->count();

        //Year
        $nDemandsYear = DocumentForm::whereYear('created_at', Carbon::now()->year)->count();
        $nPaymentsYear = Demand::whereYear('created_at', Carbon::now()->year)->where('transaction_id', '!=', null)->count();
        $nMeetingsYear = Meeting::whereYear('meeting_date', Carbon::now()->year)->count();

        $nUsers = User::count();
        $nDemands = Demand::count();
        $nPayments = Demand::where('transaction_id', '!=', null)->count();
        $nMeetings = Meeting::count();
        return view('dashboard', compact('nUsers', 'nDemands', 'nDemandsToday', 'nMeetingsToday', 'nMeetings', 'nPayments', 'nPaymentsToday', 'nDemandsWeek', 'nPaymentsWeek', 'nMeetingsWeek', 'nDemandsMonth', 'nPaymentsMonth', 'nMeetingsMonth', 'nDemandsYear', 'nPaymentsYear', 'nMeetingsYear'));
    }

    public function export($period = null) {
        $items = null;
        $now = Carbon::now();
        $weekStart = $now->subDays($now->dayOfWeek)->setTime(0, 0);
        switch($period) {
            case "year":
                $items = DocumentForm::whereYear('created_at', Carbon::now()->year); break;
            case "week":
                $items = DocumentForm::whereDate('created_at', '>=', $weekStart); break;
            case "month":
                $items = DocumentForm::whereMonth('created_at', Carbon::now()->month); break;
            default:
                $items = DocumentForm::whereDate('created_at', now());
        }

        // $items->select('last_name AS NOM', 'first_name AS PRENOM', 'birthdate AS DATE D\'ANNIVERSAIRE', 'origin_country AS PAYS D\'ORIGINE', 'origin_commune AS COMMUNE D\'ORIGINE', 'job AS PROFESSION', 'phone AS NUMERO DE TELEPHONE', 'phone_alt AS NUMERO DE TELEPHONE ALTERNATIF', 'spouse_name AS NOM DU CONJOINT', 'genre AS SEXE', 'diploma AS DIPLÔME', 'email AS ADRESSE EPMAIL', 'mailbox AS BOÎTE POSTALE', 'father_first_name AS NOM DU PERE', 'father_last_name AS PRENOM DU PERE', 'mother_first_name AS NOM DE LA MERE', 'mother_last_name AS PRENOM DE LA MERE', 'ethnic_grp AS GROUPE ETHNIQUE', 'arrival_date_ci AS DATE D\'ARRIVEE EN COTE D\'IVOIRE', 'residence_commune AS COMMUNE DE RESIDENCE', 'ravip_number AS NUMERO RAVIP', 'n_children AS NOMBRE D\'ENFANTS', 'eye_color AS COULEUR DES YEUX', 'hair_color AS COULEUR DES CHEVEUX', 'complexion_color AS TEINT', 'other_signs AS AUTRES SIGNES', 'height AS TAILLE');

        $style = (new StyleBuilder())->setFontName("Arial")
                    ->setFontSize(10)
                    ->setFontColor(Color::BLACK)
                    ->setBackgroundColor(Color::rgb(246,248,250))
                    ->setShouldWrapText()
                    ->setCellAlignment(CellAlignment::LEFT)
                    ->build();
        $writer = SimpleExcelWriter::streamDownload("demandes.xlsx");
        $items->each(function ($row) use ($writer, $style) {
            $writer->addRow($row->toArray(), $style);
        });
        return $writer->toBrowser();
    }
}