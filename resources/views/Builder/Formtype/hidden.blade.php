                                            <div class="form-group row hidden">
                                                <div class="col-md-12">
                                                    <label>{{ $Item['title'] }}:</label>
                                                </div>
                                                @if (empty($Item['icon']))
                                                <div class="col-md-6 col-sm-8">
                                                @else
                                                <div class="input-icon col-md-6 col-sm-8">
                                                    <i class="{{ $Item['icon'] }}"></i>
                                                @endif
                                                    <input type="hidden" class="form-control" name="{{ $Item['name'] }}" value="{{ $Item['value'] }}" placeholder="{{ $Item['tip'] }}">
                                                </div>
                                                <div class="col-md-6 col-sm-8">
                                                    @if(!empty($Item['tip']))
                                                    <span class="check-tips small">{{ $Item['tip'] }}</span>
                                                    @endif
                                                </div>
                                            </div>
