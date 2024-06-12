import React from "react";
import {DatePicker, DatePickerInput} from "@carbon/react";

import '@carbon/react/scss/components/date-picker/_index.scss';
import '@carbon/react/scss/components/date-picker/_date-picker.scss';

export const DatePickerComponents = ({ create_at } : {create_at: string | Date}) => (
    <div>
        <label className="required">Data paragonu </label>
        <div id="receipt_create_at">
            <div id="receipt_create_at_date">
                <DatePicker
                    value={create_at}
                    dateFormat="d/m/Y"
                    datePickerType="single"
                    onChange={function noRefCheck(el) {
                        console.log('onChange', el)
                    }}
                >
                    <DatePickerInput
                        id="date-picker-single"
                        labelText="Date Picker label"
                        onChange={function noRefCheck() {
                        }}
                        placeholder="dd/mm/yyyy"
                    />
                </DatePicker>
            </div>
        </div>
    </div>
);