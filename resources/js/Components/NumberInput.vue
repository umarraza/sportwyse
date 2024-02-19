<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>


<template>
    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
        <span class="input-group-btn input-group-prepend"></span>
        <span class="bootstrap-touchspin-prefix input-group-prepend">
            <span class="input-group-text">$</span></span>
        <input 
            ref="input" 
            class="form-control" 
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)">
    </div>
</template>
