import React, {useEffect, useState} from "react";
import {Select, SelectItem} from "@carbon/react";
import '@carbon/react/scss/components/select/_index.scss';
import '@carbon/react/scss/components/select/_select.scss';
import {dataInterface} from "../ShopList/ShopList";

export const ProductList = () => {

    const URL = '/api/products';
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


    console.log(data)

    {/*}
                    <label htmlFor="receipt_product" className="required">Produkt </label>
                    <select id="receipt_product" name="receipt[product]">
                        <option value="1">mleko</option>
                        <option value="2">jogurt</option>
                        <option value="3">ser żółty</option>
                        <option value="4">ser biały</option>
                        <option value="5">dzem</option>
                        <option value="6">ciaska owsiane</option>
                        <option value="7">jaja</option>
                        <option value="8">chleb</option>
                        <option value="9">paluszki</option>
                        <option value="10">mąka</option>
                        <option value="11">plaster</option>
                        <option value="12">Tymbark</option>
                        <option value="13">wafel</option>
                        <option value="14">Play</option>
                        <option value="15">Piwo</option>
                        <option value="16">Proszek Do Prania</option>
                        <option value="17">Jabłka</option>
                        <option value="18">Kisiel</option>
                        <option value="19">Surówka</option>
                        <option value="20">Paprykarz</option>
                        <option value="21">masło</option>
                        <option value="22">parówki</option>
                        <option value="23">Papier WC</option>
                        <option value="24">Leki</option>
                        <option value="25">Witaminy</option>
                        <option value="26">Pierogi z mięsem</option>
                        <option value="27">Pyzzy</option>
                        <option value="28">Chrupki do Mleka</option>
                        <option value="29">Prażynki</option>
                        <option value="30">zupa błyskawiczna</option>
                        <option value="31">Ziemniaki</option>
                        <option value="32">Cukier</option>
                        <option value="33">saładka rybna</option>
                        <option value="34">Polędwica z warzywami</option>
                        <option value="35">płatki owsiane</option>
                        <option value="36">serek topiony</option>
                        <option value="37">Przyprawy</option>
                        <option value="38">Polędwica</option>
                        <option value="39">Karma dla Psa</option>
                        <option value="40">czekolada</option>
                        <option value="41">marchewka z groszkiem</option>
                        <option value="42">Torba - reklamówka</option>
                        <option value="43">ciastka</option>
                        <option value="44">biszkopt</option>
                        <option value="45">kurczak</option>
                        <option value="46">gołąbki w sosie</option>
                        <option value="47">herbata</option>
                        <option value="48">mięta</option>
                        <option value="49">melisa</option>
                        <option value="50">czystek</option>
                        <option value="51">serek</option>
                        <option value="52">Bannany</option>
                        <option value="53">serdelki Pyszne</option>
                        <option value="54">Pomidor</option>
                        <option value="55">Bilet PKP</option>
                        <option value="56">bilet pks</option>
                        <option value="57">cześci komputerowe</option>
                        <option value="58">Kajzerki</option>
                        <option value="59">druk</option>
                        <option value="60">pestki</option>
                        <option value="61">chusteczki hifieniczne</option>
                        <option value="62">Burak</option>
                        <option value="63">Druciak</option>
                        <option value="64">Majonez</option>
                        <option value="65">Galaretka</option>
                        <option value="66">Makaron</option>
                        <option value="67">sos</option>
                        <option value="68">Wódka 200ml</option>
                        <option value="69">hamburger</option>
                        <option value="70">Lizak</option>
                        <option value="71">Gazeta</option>
                        <option value="72">Napój</option>
                        <option value="73">Pizza</option>
                        <option value="74">Hotdog</option>
                        <option value="75">Ubrania</option>
                        <option value="76">Pączek</option>
                        <option value="77">frytki</option>
                        <option value="78">Kawa</option>
                        <option value="79">Kiełki</option>
                        <option value="80">Bulion</option>
                        <option value="81">Ogórek</option>
                        <option value="82">Pierogi ze szpinakiem</option>
                        <option value="83">Ryż</option>
                        <option value="84">Woda Mineralna</option>
                        <option value="85">Lody</option>
                        <option value="86">Brkuły</option>
                        <option value="87">Kalafior</option>
                        <option value="88">Pyzy Z Mięsem</option>
                        <option value="89">deserek</option>
                        <option value="90">cebul</option>
                        <option value="91">Arbuz</option>
                        <option value="92">cukierki</option>
                        <option value="93">kaszka</option>
                        <option value="94">Krokiety</option>
                        <option value="95">Włoszczyzna</option>
                        <option value="96">Szpinak</option>
                        <option value="97">Fasolka Szparagowa</option>
                        <option value="98">Lego</option>
                        <option value="99">Świeczki</option>
                        <option value="100">Kechup</option>
                        <option value="101">Korniszony</option>
                        <option value="102">musztarda</option>
                        <option value="103">Pierogi Ruskie</option>
                        <option value="104">Ciasto Francuskie</option>
                        <option value="105">Ręczniki Papierowe</option>
                        <option value="106">Paluszki rybne</option>
                        <option value="107">Brzoskwinia</option>
                        <option value="108">Strucla</option>
                        <option value="109">Kiełbasa</option>
                        <option value="110">ibuprom</option>
                        <option value="111">Napój Gazowany</option>
                        <option value="112">Kukurydza</option>
                        <option value="113">Mandarynki</option>
                        <option value="114">Bombonierka</option>
                        <option value="115">Torcik Wedleski</option>
                        <option value="116">Kasza</option>
                        <option value="117">Pasztet</option>
                        <option value="118">Rzodkiewka</option>
                        <option value="119">Zeszyt</option>
                        <option value="120">elektronika</option>
                        <option value="121">śledzie</option>
                        <option value="122">warzywa</option>
                        <option value="123">farba</option>
                        <option value="124">sok</option>
                    </select>
                {/*    */}
    return (
        <Select
            id={`select-1`}
            labelText="Produkt"
            helperText="Wybierz Produkt">
            <SelectItem value="" text=""/>
            {data ? (
                data['hydra:member']?.map((item: any) => (
                    <SelectItem key={item['@id']} value={item['@id']} text={`${item.name} (${item.groups})`}/>
                ))
            ) : (
                <SelectItem value="" text="Ładowanie..."/>
            )}
        </Select>
    );
};