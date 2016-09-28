                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label>{{ $Item['title'] }}:</label>
                                                </div>
                                                @if (empty($Item['icon']))
                                                <div class="col-md-6 col-sm-8">
                                                @else
                                                <div class="input-icon col-md-6 col-sm-8">
                                                    <i class="{{ $Item['icon'] }}"></i>
                                                @endif
                                                        <select class="form-control" name="{{ $Item['name'] }}">
                                                        @foreach ($Item['options'] as $key => $option)
                                                        <option value="{{ $key }}" @if ($Item['value']==$key) selected @endif >{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-8">
                                                    @if(!empty($Item['tip']))
                                                    <span class="check-tips small">{{ $Item['tip'] }}</span>
                                                    @endif
                                                </div>
                                            </div>
