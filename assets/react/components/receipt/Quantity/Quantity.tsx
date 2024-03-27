import React from "react";
import "./Quantity.scss";
import {NumberInput} from "@carbon/react";
import '@carbon/react/scss/components/number-input/_index.scss';
import '@carbon/react/scss/components/number-input/_number-input.scss';

export const Quantity = () => {


    return (
        <>

            <div>

                <input type="hidden" id="receipt_quantity" name="receipt[quantity]" required min="1"
                       value="1"/>
            </div>
            <button className="quantity-btn"> 1</button>
            <NumberInput id="receipt_quantity" min={0}  value={2} label="Ilość" helperText="Podaj Ilość produktów" invalidText="Wartość niedopuszczalna" />

        </>
    )
}