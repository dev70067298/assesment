<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{CarModel, CarType, CarDelivery, Customer, State};

class CreateCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Customer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customerName = $this->ask('Enter customer name:');

        $states = State::pluck('id', 'name');
        $selectedState = $this->choice('Select State?', $states->keys()->toArray());

        $customerId = Customer::create([
            'name' => $customerName,
            'state_id' => $states[$selectedState],
        ]);

        $carTypes = CarType::pluck('id', 'title');
        $selectedCarType = $this->choice('Select Car Type', $carTypes->keys()->toArray());

        $carModels = CarModel::where('car_type_id',$carTypes[$selectedCarType])->pluck('id', 'title');
        $selectedCarModel = $this->choice('Select Car Model', $carModels->keys()->toArray());

        if ($this->confirm('Do you want to use Previous Location as delivery location?')) {

            $deliveryLocation = $states[$selectedState];
        }
        else{

            $selectedDeliveryState = $this->choice('Select Delivery State?', $states->keys()->toArray());
            $deliveryLocation = $states[$selectedDeliveryState];
        }

        CarDelivery::create([
            'car_model_id' => $carModels[$selectedCarModel],
            'customer_id' => $customerId->id,
            'state_id' => $deliveryLocation,
        ]);

        $this->line('ThankYou!! Your Car will be Deliver soon');
    }
}
