import React, {useState} from "react";
import {Checkbox, NumberInput, Slider} from "@carbon/react";
import '@carbon/react/scss/components/number-input/_index.scss';
import '@carbon/react/scss/components/number-input/_number-input.scss';
import '@carbon/react/scss/components/slider/_index.scss';
import '@carbon/react/scss/components/slider/_slider.scss';
import '@carbon/react/scss/components/checkbox/_index.scss';
import '@carbon/react/scss/components/checkbox/_checkbox.scss';

export const Price = () => {

    const [price, setPrice] = useState(0.0);
    const [ninetyNine, setNinetyNine] = useState(false);

    return (
        <>
            <NumberInput step={0.01} id={`price`} value={price} onChange={(e, {value})=>{
                setPrice(value as number);
            } }/>
            <Slider
                hideTextInput={true}
                labelText="Slider ceny"
                max={Math.max(Math.round(price+0.49),10)}
                min={0}
                step={1}
                value={Math.floor(price)}
                warnText="Warning message goes here"
                onChange={({value}) => setPrice(ninetyNine? value + 0.99 : value)}
            />
            <Checkbox labelText={`_.99`} id="price-ninety-nine" checked={ninetyNine} onChange={({target:{checked: checkedNinetyNine}})=>{
                setNinetyNine(checkedNinetyNine);
                setPrice(checkedNinetyNine? price + 0.99 : Math.floor(price));
            }}/>
        </>
    );
};