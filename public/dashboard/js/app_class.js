    class RemoteSelect {
        constructor(selector, url, isCondition, condition, isDefault, defaultValue, defaultText) {
            this.selector = selector;
            this.url = url;
            this.isCondition = isCondition;
            this.condition = condition;
            this.isDefault = isDefault;
            this.defaultValue = defaultValue;
            this.defaultText = defaultText;
        }
        _selection(callbackFn) {
            let url;
            if (this.isCondition) {
                url = this.url + this.condition;
            } else {
                url = this.url;
            }
            let _selector = $(this.selector).dropdown({
                apiSettings: {
                    url: url
                },
                onChange: callbackFn,
                filterRemoteData: true
            });
            if (this.isDefault) {
                _selector.dropdown('set value', this.defaultValue);
                _selector.dropdown('set text', this.defaultText);
            }
        }
    }
    class DefaultValue {
        constructor(isDefault,province_id,district_id,commune_id,village_id,provinceText,districtText,communeText,villageText){
            this.isDefault = isDefault;
            this.province_id = parseInt(province_id);
            this.district_id = parseInt(district_id);
            this.commune_id = parseInt(commune_id);
            this.village_id = parseInt(village_id);
            this.provinceText = provinceText;
            this.districtText = districtText;
            this.communeText = communeText;
            this.villageText = villageText;
        }
        setEmpty(){
            this.isDefault = false;
            this.province_id = null;
            this.district_id = null;
            this.commune_id = null;
            this.village_id = null;
            this.provinceText = null;
            this.districtText = null;
            this.communeText = null;
            this.villageText = null;
        }
    }
    class DatePicker {
        constructor(selector,type,isRange,isStart,isContinue,startRange,endRange){
            this.selector = selector;
            this.type = type;
            this.isRange = isRange;
            this.isStart = isStart;
            this.isContinue = isContinue;
            this.startRange = startRange;
            this.endRange = endRange;
        }
        _picker(){
            if (this.isRange){
                if (this.isStart) {
                    $(this.selector).calendar({
                        type: this.type,
                        endCalendar: $(this.endRange)
                    });
                }else {
                    if (this.isContinue){
                        $(this.selector).calendar({
                            type: this.type,
                            startCalendar: $(this.startRange),
                            endCalendar: $(this.endRange)
                        });
                    } else{
                        $(this.selector).calendar({
                            type: this.type,
                            startCalendar: $(this.startRange)
                        });
                    }
                }
            }else {
                $(this.selector).calendar({
                    type: this.type,
                });
            }
        }
        _singlePicker(){
            $(this.selector).calendar({
                type: this.type,
            });
        }
    }
    class ClearField {
        constructor(selector){
            this.selector = selector;
        }
        clear_field(){
            let fields = document.querySelectorAll(this.selector);
            $.each(fields,function (index, value) {
                $(value).val('');
            })
        }
    }
    class MinMaxCalendar {
        constructor(start_date,end_date,limit_month){
            this.start_date = start_date;
            this.end_date = end_date;
            this.limit_month = limit_month;
            this.now = new Date();
            this.days = 0;
        }
        _picker(fnPicker){
            $(this.start_date).calendar({
                type: 'date',
                endCalendar: $(this.end_date),
                onChange: fnPicker
            });
        }

    }
