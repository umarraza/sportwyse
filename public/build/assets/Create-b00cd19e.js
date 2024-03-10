import{T as _,s as n,o as h,e as b,a as o,b as l,u as t,p as y,A as v,k as f,N as V}from"./app-fdb81d13.js";import{T as g}from"./VueSearchSelect-5509f0f2.js";const w={class:"modal fade add-transaction-modal",tabindex:"-1",role:"dialog","aria-labelledby":"myLargeModalLabel","aria-hidden":"true"},I={class:"modal-dialog modal-xl"},C={class:"modal-content"},k=o("div",{class:"modal-header"},[o("h5",{class:"modal-title mt-0",id:"myLargeModalLabel"},"Add Payment"),o("button",{type:"button",class:"close modal-close-btn","data-dismiss":"modal","aria-label":"Close"},[o("span",{"aria-hidden":"true"},"×")])],-1),S={class:"modal-body"},T={class:"row"},P={class:"col-md-12"},x={class:"form-group row"},D=o("label",{class:"col-sm-4 col-form-label"},"Select Player",-1),N={class:"col-sm-8"},O={class:"col-md-12"},B={class:"form-group row"},q=o("label",{class:"col-sm-4 col-form-label"},"Date",-1),A={class:"col-sm-8"},L={class:"col-md-12"},M={class:"form-group row"},U=o("label",{class:"col-sm-4 col-form-label",for:"eventId"},"Amount:",-1),E={class:"col-sm-8"},j={class:"col-md-12"},F={class:"form-group row"},$=o("label",{class:"col-sm-4 col-form-label",for:"playerId"},"Status:",-1),z={class:"col-sm-8"},G=V('<option value="Cash">Cash</option><option value="Credit">Credit</option><option value="Scholarship">Scholarship</option><option value="Injury">Injury</option><option value="On Break">On Break</option><option value="Other">Other</option>',6),H=[G],J=o("div",{class:"modal-footer"},[o("button",{type:"button",class:"btn btn-secondary","data-dismiss":"modal"},"Close"),o("button",{type:"submit",class:"btn btn-primary waves-effect ml-1 waves-light"},"Submit")],-1),R={__name:"Create",props:{propPlayerOptions:{type:Array,required:!0},propCampId:{type:Number,required:!0},propTeamId:{type:Number,required:!0}},setup(i){const r=i,e=_({amount:"",player_id:"",date:new Date,payment_type:"Cash",camp_id:r.propCampId,team_id:r.propTeamId,redirect_otherwise:!0}),m=()=>{r.errors={},e.transform(d=>({...d})).post(route("club.players.transactions.store",e.player_id),{onFinish:d=>{setTimeout(()=>{location.reload()},1e3),document.querySelector(".modal-close-btn").click()}}),e.reset()};return(d,s)=>{const c=n("InputError"),p=n("VueDatePicker"),u=n("TextInput");return h(),b("form",{onSubmit:f(m,["prevent"])},[o("div",w,[o("div",I,[o("div",C,[k,o("div",S,[o("div",T,[o("div",P,[o("div",x,[D,o("div",N,[l(t(g),{options:i.propPlayerOptions,modelValue:t(e).player_id,"onUpdate:modelValue":s[0]||(s[0]=a=>t(e).player_id=a),placeholder:"Search Player"},null,8,["options","modelValue"]),l(c,{class:"mt-2",message:t(e).errors.player_id},null,8,["message"])])])]),o("div",O,[o("div",B,[q,o("div",A,[l(p,{position:"left","enable-time-picker":!1,modelValue:t(e).date,"onUpdate:modelValue":s[1]||(s[1]=a=>t(e).date=a),"auto-apply":"",placeholder:"Date"},null,8,["modelValue"])])])]),o("div",L,[o("div",M,[U,o("div",E,[l(u,{id:"name",modelValue:t(e).amount,"onUpdate:modelValue":s[2]||(s[2]=a=>t(e).amount=a),type:"number",class:"mt-1 block w-full",autofocus:"",autocomplete:"amount"},null,8,["modelValue"]),l(c,{class:"mt-2",message:t(e).errors.amount},null,8,["message"])])])]),o("div",j,[o("div",F,[$,o("div",z,[y(o("select",{class:"form-control","onUpdate:modelValue":s[3]||(s[3]=a=>t(e).payment_type=a)},H,512),[[v,t(e).payment_type]])])])])])]),J])])])],32)}}};export{R as default};
