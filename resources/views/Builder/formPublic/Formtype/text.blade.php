                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>{{ $Item['title'] }}:</label>
                                                </div>
                                                <div class="col-md-6 col-sm-8">
                                                    @if (!empty($Item['icon']))
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control" name="{{ $Item['name'] }}" value="{{ $Item['value'] }}" placeholder="{{ $Item['tip'] }}">
                                                    </div>
                                                    @else
                                                    <input type="text" class="form-control" name="{{ $Item['name'] }}" value="{{ $Item['value'] }}" placeholder="{{ $Item['tip'] }}">
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-8">
                                                    @if(!empty($Item['tip']))
                                                    <span class="check-tips small">{{ $Item['tip'] }}</span>
                                                    @endif
                                                </div>
                                            </div>
