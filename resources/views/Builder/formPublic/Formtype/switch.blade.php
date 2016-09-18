                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>{{ $Item['title'] }}:</label>
                                                </div>
                                                <div  class="col-md-6 col-sm-8">
                                                    <input @if ($Item['value']=='on') checked @endif id="{{ $Item['name'] }}" type="checkbox" class="make-switch">
                                                	<input type="hidden" name="{{ $Item['name'] }}"  value="{{ $Item['value'] }}" />
                                                </div>
                                                <div class="col-md-6 col-sm-8">
                                                    @if(!empty($Item['tip']))
                                                    <span class="check-tips small">{{ $Item['tip'] }}</span>
                                                    @endif
                                                </div>
                                            </div>
