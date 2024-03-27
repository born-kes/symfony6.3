import * as React from 'react';
import {Provider} from 'react-redux'
import store from './store';
import {Counter} from './reducers/features/Counter/Counter';

const App: React.FC = () => (
    <Provider store={store}>
        <Counter/>
    </Provider>
);

export {App};