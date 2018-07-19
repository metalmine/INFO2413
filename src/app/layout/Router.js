import React from 'react'
import { Switch, Route } from 'react-router-dom'
import Main from './../Main'
import Account from './../Account'

const Router = () => (
    <Switch>
        <Route exact path='/' component={Main}/>
        <Route path='/Account' component={Account}/>
    </Switch>
)

export default Router