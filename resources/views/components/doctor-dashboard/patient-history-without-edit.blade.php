<div>
    <div class="section">
        <div class="section-icon">
            <i class="fa fa-history">
                <span>Medical History</span>
            </i>
        </div>
        <div class="medical-history">
            <div class="sub-container">
                <div class="form-group data-container border-left-0">
                    <label for="summary">Summary</label>
                    <textarea readonly class="form-control" form="patient-form" name="summary" id="summary" cols='100' rows="60">{{$history['summary']}}</textarea>
                </div>
                <div class="form-group data-container analysis-section" id="analysis-section">
                    <div class="row responsive">
                        <div class="col-lg-5">
                            <label>Analysis</label>
                        </div>
                        <div class="col-lg-6">
                            <label>Result</label>
                        </div>
                    </div>
                    @if(count($history->analysis) < 1)
                        <div class="row responsive" id="analysis-lg-screen1">
                            <div class="col-lg-5" id="analysis-title-lg-screen1">
                                <input readonly class="form-control d-inline-block" form="patient-form" name="analysis-name[]" placeholder="Analysis Name"/>
                            </div>
                            <div class="col-lg-6">
                                <input readonly class="form-control d-inline-block" form="patient-form" name="analysis-result[]" placeholder="Analysis Result"/>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="analysis-sm-screen1">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Analysis</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" name="analysis-name[]" id="name1" placeholder="Analysis Name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" name="analysis-result[]" id="result1" placeholder="Analysis Result"/>
                                </div>
                            </div>
                        </div>
                    @endif
                    @for($i = 0; $i < count($history->analysis); $i++)
                        <div class="row responsive" id="analysis-lg-screen{{ $i + 1 }}">
                            <div class="col-lg-5" id="{{ 'analysis-title-lg-screen'.($i + 1) }}">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-name-lg-screen'.($i + 1) }}" value="{{$history->analysis[$i]['title']}}"/>
                            </div>
                            <div class="col-lg-6">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-result-lg-screen'.($i + 1) }}" value="{{$history->analysis[$i]['result']}}"/>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="analysis-sm-screen{{ $i + 1 }}">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Analysis</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-name-sm-screen'.($i + 1) }}" value="{{$history->analysis[$i]['title']}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'analysis-result-sm-screen'.($i + 1) }}" value="{{$history->analysis[$i]['result']}}"/>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="form-group data-container analysis-section" id="rumours-section">
                    <div class="row responsive">
                        <div class="col-lg-5">
                            <label>Rumours</label>
                        </div>
                        <div class="col-lg-6">
                            <label>Result</label>
                        </div>
                    </div>
                    @if(count($history->rumour) < 1)
                        <div class="row responsive" id="rumours-lg-screen1">
                            <div class="col-lg-5" id="rumours-title-lg-screen1">
                                <input readonly class="form-control d-inline-block" form="patient-form" name="rumours-name[]" placeholder="Rumours Name"/>
                            </div>
                            <div class="col-lg-6">
                                <input readonly class="form-control d-inline-block" form="patient-form" name="rumours-result[]" placeholder="Rumours Result"/>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="rumours-sm-screen1">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Rumours</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" name="rumours-name[]" id="name1" placeholder="Rumours Name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" name="rumours-result[]" id="result1" placeholder="Rumours Result"/>
                                </div>
                            </div>
                        </div>
                    @endif
                    @for($i = 0; $i < count($history->rumour); $i++)
                        <div class="row responsive" id="rumours-lg-screen{{ $i + 1 }}">
                            <div class="col-lg-5" id="{{ 'rumours-title-lg-screen'.($i + 1) }}">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-name-lg-screen'.($i + 1) }}" value="{{$history->rumour[$i]['title']}}"/>
                            </div>
                            <div class="col-lg-6">
                                <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-result-lg-screen'.($i + 1) }}" value="{{$history->rumour[$i]['result']}}"/>
                            </div>
                        </div>
                        <div class="mobile-responsive" id="rumours-sm-screen{{ $i + 1 }}">
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Rumours</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-name-sm-screen'.($i + 1) }}" value="{{$history->rumour[$i]['title']}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <span>Result</span>
                                </div>
                                <div class="col-sm-10">
                                    <input readonly class="form-control d-inline-block" form="patient-form" id="{{ 'rumours-result-sm-screen'.($i + 1) }}" value="{{$history->rumour[$i]['result']}}"/>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
