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
            <form id="patient-form" action="doctor" method="post">
                @csrf
            <x-patient-data :name="$userTurn->user->name" :id="$userTurn->user->id" :age="$userTurn->user->patient->age" />
            <x-patient-history :history="$userTurn->user" />
            <x-patient-clinic-history :patient-history="$userTurn->user" />
{{--            <x-patient-form />--}}

{{--                move fourm --}}
                <div>
                    <div class="section">
                        <div class="section-icon">
                            <i class="fa fa-user">
                                <span>Illness Form</span>
                            </i>
                        </div>
                        <input type="hidden" name="user_id" value="{{$userTurn->user->id}}">
                        <div class="patient-form">
                            <div class="form-group sub-container row">
                                <label for="illness" class="col-sm-2 col-form-label">Illness</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-25" id="illness" name="illness-name" form="patient-form" placeholder="Illness">
                                    <small  class="form-text text-muted"><span style="color:red">@error("illness-name"){{$message}}@enderror</span></small>
                                </div>
                            </div>
                            <div class="form-group sub-container">
                                <label for="illness-diagnose">Illness Diagnose</label>
                                <textarea class="form-control w-50" id="illness-diagnose" name="illness-diagnose" form="patient-form" rows="3"></textarea>
                                <small  class="form-text text-muted"><span style="color:red">@error("illness-diagnose"){{$message}}@enderror</span></small>
                            </div>
                            <div class="sub-container" id="drugs">
                                <span class="title">Drugs</span>
                                <script>
                                    let numberOfDrugs = [1];
                                </script>
                                <div class="row mt-2" id="drug1">
                                    <div class="col-lg-3">
                                        <input type="text" class="form-control" name="drugname[]" form="patient-form" placeholder="Drug Name">
                                        <small  class="form-text text-muted"><span style="color:red">@error("drug1-name"){{$message}}@enderror</span></small>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="drugdescription[]" form="patient-form" placeholder="Drug Description">
                                        <small  class="form-text text-muted"><span style="color:red">@error("drug1-description"){{$message}}@enderror</span></small>
                                    </div>
                                    <div class="col-lg-3" id="buttons-container1">
                                        <i class="btn fa fa-plus" id="new-button" onclick="addDrug()"></i>
                                        <i class="btn fa fa-trash" onclick="removeDrug(1)"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        Array.prototype.remove = function() {
                            let what, a = arguments, L = a.length, ax;
                            while (L && this.length) {
                                what = a[--L];
                                while ((ax = this.indexOf(what)) !== -1) {
                                    this.splice(ax, 1);
                                }
                            }
                            return this;
                        };
                        function addDrug() {
                            let id = numberOfDrugs[numberOfDrugs.length - 1] + 1;
                            numberOfDrugs.push(id);
                            $('#new-button').remove();
                            let newDrug = '<div class="row mt-2" id="drug' + id + '">\n' +
                                '                    <div class="col-lg-3">\n' +
                                '                        <input type="text" class="form-control" name="drugname[]" form="patient-form" placeholder="Drug Name">\n' +
                                '                    </div>\n' +
                                '                    <div class="col-lg-6">\n' +
                                '                        <input type="text" class="form-control" name="drugdescription[]" form="patient-form" placeholder="Drug Description">\n' +
                                '                    </div>\n' +
                                '                    <div class="col-lg-3" id="buttons-container' + id + '">\n' +
                                '                        <i class="btn fa fa-plus" id="new-button" onclick="addDrug()"></i>\n' +
                                '                        <i class="btn fa fa-trash" onclick="removeDrug(' + id + ')"></i>\n' +
                                '                    </div>\n' +
                                '                </div>'
                            $('#drugs').append(newDrug)
                        }
                        function removeDrug(id) {
                            if (numberOfDrugs.length > 1) {
                                if (id !== numberOfDrugs[numberOfDrugs.length - 1]) {
                                    $('#drug' + id).remove();
                                    numberOfDrugs.remove(id);
                                }
                                else {
                                    $('#drug' + id).remove();
                                    numberOfDrugs.remove(id);
                                    $('<i class="btn fa fa-plus" id="new-button" onclick="addDrug()"></i>').prependTo('#buttons-container' + numberOfDrugs[numberOfDrugs.length - 1])

                                }
                            }
                        }
                    </script>
                </div>
                <button type="submit" form="patient-form" class="btn btn-primary mt-5 ml-5">Save</button>
            </form>
        </div>
    </div>
@endsection
