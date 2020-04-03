<template>
    <default-field :field="field">
        <template slot="field">
            <div style="display: flex">
                <input :id="field.name" type="text"
                       class="w-full form-control form-input form-input-bordered"
                       :class="errorClasses"
                       :placeholder="field.name"
                       autocomplete="off"
                       v-model="value"/>
                <input type="button" class="btn btn-default btn-outline-primary ml-3 cursor-pointer" value="Generate" v-on:click="generate();">
                <div class="tooltip">
                    <button type="button" class="btn btn-default btn-outline-grey ml-3 cursor-pointer" v-on:click="copyPassword()">
                        Copy
                    </button>
                </div>
            </div>
            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],
    methods: {
        generate() {
          var chars = '';
            if (this.field.exclude_rules && this.field.exclude_rules.length > 0){
              for (var j = 0; j < this.field.exclude_rules.length; j++){
                this.field.exclude_rules[j] =  this.field.exclude_rules[j].toLowerCase();
              }
              if (this.field.exclude_rules.includes('symbols')
                && this.field.exclude_rules.includes('numbers')
                && this.field.exclude_rules.includes('uppercase')
                && this.field.exclude_rules.includes('lowercase')){
                alert('Include at least one characters type! Symbols, Numbers, Lowercase, Uppercase');
                return false;
              }

              if (!this.field.exclude_rules.includes('symbols')){
                chars += '!@#$%^&*()-+<>'
              }
              if (!this.field.exclude_rules.includes('numbers')){
                chars += '1234567890'
              }
              if (!this.field.exclude_rules.includes('uppercase')){
                chars += 'ABCDEFGHIJKLMNOP'
              }
              if (!this.field.exclude_rules.includes('lowercase')){
                chars += 'abcdefghijklmnopqrstuvwxyz'
              }
            } else{
              chars = 'abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>1234567890ABCDEFGHIJKLMNOP';
            }

            var pass = "";
            var length = 10;
            if (this.field.length > 0){
                length = this.field.length;
            }
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }
            this.value = pass;
        },
        copyPassword() {
            var copyText = document.getElementById(this.field.name);
            var tooltip = document.getElementById("myTooltip");
            if (copyText.value.length > 0) {
                copyText.select();
                document.execCommand("copy");
                tooltip.innerHTML = "Copied";
            }
            else{
                tooltip.innerHTML = "Generate a password first";
            }
        },
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
          this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
          formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
          this.value = value
        }
    }
}
</script>

<style type="text/css">
  .btn-outline-primary {
    border: 2px var(--primary) solid;
    line-height: 2px;
    color: var(--primary);
    text-shadow: none;
  }
  .btn-outline-grey {
    border: 2px var(--50) solid;
    line-height: 2px;
    color: var(--80);
    text-shadow: none;
  }
</style>