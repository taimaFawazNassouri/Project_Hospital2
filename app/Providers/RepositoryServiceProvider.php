<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Repository\Services\SingleServiceRepository;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Repository\Insurances\InsuranceRepository;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Repository\Patients\PatientRepository;
use App\Interfaces\Finance\ReceiptRepositoryInterface;
use App\Repository\Finance\ReceiptRepository;
use App\Interfaces\Finance\PaymentRepositoryInterface;
use App\Repository\Finance\PaymentRepository;
use App\Interfaces\RayEmployee\RayEmployeeRepositoryInterface;
use App\Repository\RayEmployee\RayEmployeeRepository;
use App\Interfaces\LaboratorieEmployee\LaboratorieEmployeeRepositoryInterface;
use App\Repository\LaboratorieEmployee\LaboratorieEmployeeRepository;
use App\Interfaces\Doctor_dashboard\DoctorInvoiceRepositoryInterface;
use App\Repository\Doctor_dashboard\DoctorInvoiceRepository;
use App\Interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use App\Repository\Doctor_dashboard\DiagnosisRepository;
use App\Interfaces\Doctor_dashboard\RayRepositoryInterface;
use App\Repository\Doctor_dashboard\RayRepository;
use App\Interfaces\Doctor_dashboard\LaboratorieRepositoryInterface;
use App\Repository\Doctor_dashboard\LaboratoriesRepository;
use App\Interfaces\RayEmployee_dashboard\InvoiceRepositoryInterface;
use App\Repository\RayEmployee_dashboard\InvoiceRepository;
use App\Interfaces\Laboratorie_dashboard\InvoiceLaboratorieRepositoryInterface;
use App\Repository\Laboratorie_dashboard\InvoiceLaboratorieRepository;
use App\Interfaces\Patient_dashboard\InvoicePatientRepositoryInterface;
use App\Repository\Patient_dashboard\InvoicePatientRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //admin
        $this->app->bind(SectionRepositoryInterface::class ,SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class ,DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class ,SingleServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class ,InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class ,AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class ,PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class ,ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class ,PaymentRepository::class);
        $this->app->bind(RayEmployeeRepositoryInterface::class ,RayEmployeeRepository::class);
        $this->app->bind(LaboratorieEmployeeRepositoryInterface::class ,LaboratorieEmployeeRepository::class);



        //Dashboard Doctors
        $this->app->bind(DoctorInvoiceRepositoryInterface::class ,DoctorInvoiceRepository::class);
        $this->app->bind(DiagnosisRepositoryInterface::class ,DiagnosisRepository::class);
        $this->app->bind(RayRepositoryInterface::class ,RayRepository::class);
        $this->app->bind(LaboratorieRepositoryInterface::class ,LaboratoriesRepository::class);

        //Dashboard RayEmployee
        $this->app->bind(InvoiceRepositoryInterface::class ,InvoiceRepository::class);
        //Dashboard Laboratorie
         $this->app->bind(InvoiceLaboratorieRepositoryInterface::class ,InvoiceLaboratorieRepository::class);
        //Dashboard Patient
         $this->app->bind(InvoicePatientRepositoryInterface::class ,InvoicePatientRepository::class);
       



         







    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
