import React, {JSX, useState} from 'react';
import {DatePickerComponents} from './DatePicker/DatePicker';
import {ProductList} from './ProductList/ProductList';
import {ShopList} from './ShopList/ShopList';
import {Price} from './Price/Price';
import {Quantity} from './Quantity/Quantity';
import {Button} from "@carbon/react";

import '@carbon/react/scss/components/button/_index.scss';
import '@carbon/react/scss/components/button/_button.scss';

export const Receipt = (): JSX.Element => {

    const [create_at] = useState<string | Date>(new Date());

    const style = {
        border: '1px solid black',
        padding: '10px',
    }

    return (
        <div>
            <h1>Dodaj paragon ✅</h1>
            <form name="receipt" method="post">
                <div style={style}>
                    <DatePickerComponents create_at={create_at}/>
                </div>
                <div children={<ShopList/>} style={style}/>
                <div children={<ProductList/>} style={style}/>
                <div children={<Price/>} style={style}/>
                <div children={<Quantity/>} style={{...style, display: 'flex'}}/>
                <Button>Dodaj</Button>
            </form>
        </div>
    )
};