@extends('components.app')
@section('content')
    <div class="doctor-dashboard-style">
        <?php
            $patientData = [
                'name'  =>  'Ahmed Abobakr Mehanna',
                'id'    =>  '123456789',
                'age'   =>  '20',
                'history'   =>  [
                    'summary'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla',
                    'analysis'  =>  [
                        [
                            'title' =>  'Analysis 1',
                            'result'    =>  'Result Analysis 1'
                        ],
                        [
                            'title' =>  'Analysis 2',
                            'result'    =>  'Result Analysis 2'
                        ],
                        [
                            'title' =>  'Analysis 3',
                            'result'    =>  'Result Analysis 3'
                        ],
                        [
                            'title' =>  'Analysis 4',
                            'result'    =>  'Result Analysis 4'
                        ]
                    ],
                    'rumours' => [
                        [
                            'title' =>  'Rumours 1',
                            'result'    =>  'Result Rumours 1'
                        ],
                        [
                            'title' =>  'Rumours 2',
                            'result'    =>  'Result Rumours 2'
                        ],
                        [
                            'title' =>  'Rumours 3',
                            'result'    =>  'Result Rumours 3'
                        ],
                        [
                            'title' =>  'Rumours 4',
                            'result'    =>  'Result Rumours 4'
                        ]
                    ]
                ],
                'clinic-history'    =>  [
                    [
                        'date'  =>  '25/09/2020',
                        'illness'   =>  'Stomach Pain',
                        'diagnose'  =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla',
                        'drugs'  =>  [
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ]
                        ]
                    ],
                    [
                        'date'  =>  '25/09/2020',
                        'illness'   =>  'Stomach Pain',
                        'diagnose'  =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla',
                        'drugs'  =>  [
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ]
                        ]
                    ],
                    [
                        'date'  =>  '25/09/2020',
                        'illness'   =>  'Stomach Pain',
                        'diagnose'  =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla',
                        'drugs'  =>  [
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ],
                            [
                                'name'  =>  'drug1',
                                'description'   =>  'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla'
                            ]
                        ]
                    ]
                ]
            ];
        ?>
        <div class="container-fluid">


            <x-patient-data :name="$userTurn->user->name" :id="$userTurn->user->id" :age="$userTurn->user->patient->age" />
            <x-patient-history :history="$userTurn->user" />
            <x-patient-clinic-history :patient-history="$userTurn->user" />
            <x-patient-form />
{{--            <x-patient-form />--}}

{{--                move fourm --}}
            <form id="patient-form" action="doctor" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$userTurn->user->id}}">


            </form>
            <button type="submit" form="patient-form" class="btn btn-primary mt-5 ml-5">Save</button>
        </div>
    </div>
@endsection
