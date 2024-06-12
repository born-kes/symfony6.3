import React, {useEffect, useState} from "react";
import {Select, SelectItem} from "@carbon/react";
import '@carbon/react/scss/components/select/_index.scss';
import '@carbon/react/scss/components/select/_select.scss';

// type dataType


export interface dataInterface {
    '@context'?: string;
    '@id'?: string;
    '@type'?: 'hydra:Collection' | string;
    'hydra:member'?: any[];
    'hydra:totalItems'?: number;
}

export const ShopList = () => {

    const URL = '/api/shops';
    const [data, setData] = useState({} as dataInterface);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await fetch(URL);
                const jsonData = await response.json();
                setData(jsonData);
            } catch (error) {
                console.error('Błąd pobierania danych z API:', error);
            }
        };

        fetchData();

        return () => {};
    }, []);

    return (
        <>
            <Select
                id={`receipt_shop`}
                labelText="Sklep"
                helperText="Wybierz sklep z listy">
                {data ? (
                    data['hydra:member']?.map((item: any) => (
                        <SelectItem key={item['@id']} value={item['@id']} text={`${item.name} (${item.address})`}/>
                    ))
                ) : (
                    <SelectItem value="" text="Ładowanie..."/>
                )}
            </Select>
        </>
    );
};