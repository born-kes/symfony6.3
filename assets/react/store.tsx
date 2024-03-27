import { configureStore } from '@reduxjs/toolkit'
import counterReducer from './reducers/features/./Counter/CounterSlice'

export default configureStore({
    reducer: {
        counter: counterReducer,
    },
})