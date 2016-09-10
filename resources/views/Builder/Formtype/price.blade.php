<case value="price">
    <div class="form-group item_{$[type]form.name} {$[type]form.extra_class}">
        <label class="left control-label">{$[type]form.title}：</label>
        <div class="right">
            <input type="text" class="form-control input num" name="{$[type]form.name}" value="{$[type]form.value}" {$[type]form.extra_attr}>
            <notempty name="[type]form.tip">
                <span class="check-tips small">{$[type]form.tip}</span>
            </notempty>
        </div>
    </div>
</case>
