<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">
            {{ filter.name }}
        </h3>

        <div class="p-2">
            <date-time-picker
                class="w-full form-control form-input form-input-bordered"
                dusk="nova-date-time-filter"
                name="nova-date-time-filter"
                :value="value"
                :placeholder="placeholder"
                :date-format="pickerFormat"
                :alt-format="pickerDisplayFormat"
                :twelve-hour-time="pickerTwelveHourTime"
                :enable-time="pickerEnableTime"
                :enableSeconds="pickerEnableSeconds"
                :first-day-of-week="pickerFirstDayOfWeek"
                @input.prevent=""
                @change="handleChange"
            />
        </div>
    </div>
</template>

<script>

export default {
    props: {
        resourceName: {
            type: String,
            required: true,
        },
        filterKey: {
            type: String,
            required: true,
        },
        lens: String,
    },

    methods: {
        handleChange(value) {
            this.$store.commit(`${this.resourceName}/updateFilterState`, {
                filterClass: this.filterKey,
                value,
            })
            this.$emit('change')
        },
    },

    mounted() {
        console.log(this.filter)
    },

    computed: {

        value() {
            return this.filter.currentValue
        },

        filter() {
            return this.$store.getters[`${this.resourceName}/getFilter`](
                this.filterKey
            )
        },

        options() {
            return this.$store.getters[`${this.resourceName}/getOptionsForFilter`](
                this.filterKey
            )
        },

        pickerFirstDayOfWeek() {
            return this.filter.pickerFirstDayOfWeek || 0
        },

        placeholder() {
            return this.filter.placeholder || moment().format('YYYY-MM-DD HH:mm:ss')
        },

        pickerFormat() {
            return this.filter.pickerFormat || 'Y-m-d H:i:S'
        },

        pickerDisplayFormat() {
            return this.filter.pickerDisplayFormat || 'Y-m-d H:i:S'
        },

        pickerDefaultHour() {
            return this.filter.pickerDefaultHour || 0
        },

        pickerDefaultMinute() {
            return this.filter.pickerDefaultMinute || 0
        },

        pickerDefaultSeconds() {
            return this.filter.pickerDefaultSeconds || 0
        },

        pickerTwelveHourTime() {
            return !!this.filter.pickerTwelveHourTime;
        },

        pickerEnableTime() {
            return !!this.filter.pickerEnableTime;
        },

        pickerEnableSeconds() {
            return !!this.filter.pickerEnableSeconds;
        }
    },
}
</script>
