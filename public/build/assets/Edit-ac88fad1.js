import{d,$,M as j,a2 as L,L as M,s as I,o as f,c as z,w as g,a as e,b as u,f as c,k as S,u as h,p as m,z as V,A as q,v as p,t as a,e as A,j as R,i as H,F as G,O as T,a0 as J,a1 as K}from"./app-5970ba1c.js";import{T as b}from"./VueSearchSelect-717b3351.js";import Q from"./AppLayout-524581ba.js";import{P as N}from"./Pagination-a07f96ce.js";import W from"./CancelButton-1d08b1be.js";import X from"./SaveSearch-fafe341c.js";import{_ as Y}from"./_plugin-vue_export-helper-c27b6911.js";import"./Banner-ab1c5b7d.js";import"./Sidebar-8e9db51e.js";import"./Header-d02ccdfd.js";import"./DropdownLink-d586455d.js";const o=n=>(J("data-v-4c3e55d0"),n=n(),K(),n),Z={class:"row"},ee={class:"col-md-12"},te={class:"card"},se={class:"card-header"},oe=o(()=>e("h4",{class:"pl-2"},[e("i",{class:"fas fa-edit"}),c(" Update Transactions")],-1)),le={class:"card-header-right"},ne={class:"card-body"},ae={class:"row mt-5"},ie={class:"col-md-4"},de={class:"form-group"},re=o(()=>e("label",{class:"col-form-label"},"Search Event",-1)),ce={class:"col-md-4"},ue={class:"form-group"},me=o(()=>e("label",{class:"col-form-label"},"Search Player",-1)),pe={class:"col-md-4"},_e={class:"form-group"},ye=o(()=>e("label",{class:"col-form-label"},"From Date",-1)),ve={class:"col-md-4"},fe={class:"form-group"},ge=o(()=>e("label",{class:"col-form-label"},"To Date",-1)),he={class:"col-md-4"},be={class:"form-group"},Ae=o(()=>e("label",{class:"col-form-label"},"From Amount",-1)),Be={class:"col-md-4"},Pe={class:"form-group"},ke=o(()=>e("label",{class:"col-form-label"},"To Amount",-1)),Ee={class:"col-md-4"},Ce={class:"form-group"},we=o(()=>e("label",{class:"col-form-label"},"Paginate By Size",-1)),De=o(()=>e("option",{value:""},"(none)",-1)),Ie=o(()=>e("option",{value:"10"},"10",-1)),Se=o(()=>e("option",{value:"100"},"100",-1)),Ve=o(()=>e("option",{value:"200"},"200",-1)),Te=o(()=>e("option",{value:"300"},"300",-1)),Ne=o(()=>e("option",{value:"400"},"400",-1)),Ue=o(()=>e("option",{value:"500"},"500",-1)),xe=o(()=>e("option",{value:"700"},"700",-1)),Oe=o(()=>e("option",{value:"900"},"900",-1)),Fe=o(()=>e("option",{value:"1000"},"1000",-1)),$e=[De,Ie,Se,Ve,Te,Ne,Ue,xe,Oe,Fe],je={class:"row mt-2"},Le={class:"col-md-4"},Me={class:"custom-control custom-checkbox"},ze={class:"custom-control-label",for:"allAssigned"},qe={class:"col-md-4"},Re={class:"custom-control custom-checkbox"},He={class:"custom-control-label",for:"assignedByEvent"},Ge={class:"col-md-4"},Je={class:"custom-control custom-checkbox"},Ke={class:"custom-control-label",for:"assignedByPlayer"},Qe={class:"row mt-3"},We={class:"col-md-4"},Xe={class:"custom-control custom-checkbox"},Ye={class:"custom-control-label",for:"allUnAssigned"},Ze={class:"col-md-4"},et={class:"custom-control custom-checkbox"},tt={class:"custom-control-label",for:"unAssignedByEvent"},st={class:"col-md-4"},ot={class:"custom-control custom-checkbox"},lt={class:"custom-control-label",for:"unAssignedByPlayer"},nt={class:"row mt-3"},at={class:"col-md-12"},it=o(()=>e("h4",{class:"mt-5"},"Select Events & Players to Assign Data",-1)),dt={class:"row"},rt={class:"col-md-6"},ct={class:"form-group"},ut=o(()=>e("label",{class:"col-form-label"},"Select Event",-1)),mt={class:"col-md-6"},pt={class:"form-group"},_t=o(()=>e("label",{class:"col-form-label"},"Select Player",-1)),yt={class:"form-group text-right mt-3"},vt=o(()=>e("button",{type:"button",class:"btn btn-success waves-effect ml-1 waves-light","data-toggle":"modal","data-target":"#saveSearchModal"},"Save Search",-1)),ft=["disabled"],gt={class:"row mt-5"},ht={class:"col-md-12"},bt={key:0,class:"alert alert-success text-center",role:"alert"},At={class:"pagination-container"},Bt={class:"total"},Pt=o(()=>e("label",null,"Total Failed Transactions:",-1)),kt=o(()=>e("label",null,"Total (This Page):",-1)),Et=o(()=>e("label",null,"Total Assigned: (Event & Player)",-1)),Ct=o(()=>e("label",null,"Total Pending (Event & Player):",-1)),wt=o(()=>e("label",null,"Total Pending (By Event):",-1)),Dt=o(()=>e("label",null,"Total Pending (By Player):",-1)),It={class:"pagination"},St={class:"table-responsive b-0","data-pattern":"priority-columns"},Vt={class:"table table-xs table-striped"},Tt=o(()=>e("th",null,"#",-1)),Nt=o(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),Ut=o(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),xt=o(()=>e("th",null,"Event Name (New)",-1)),Ot=o(()=>e("th",null,"Player Name (New)",-1)),Ft=o(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),$t=o(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),jt=o(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),Lt=o(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),Mt=o(()=>e("th",null,"Status",-1)),zt=o(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),qt=o(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),Rt=o(()=>e("th",null,"Customer ID",-1)),Ht=o(()=>e("th",null,"Invoice Number",-1)),Gt=o(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),Jt=o(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),Kt=o(()=>e("th",null,"Payment Intent ID",-1)),Qt=o(()=>e("th",null,"Statement Descriptor",-1)),Wt=o(()=>e("th",null,"Customer Description",-1)),Xt=["innerHTML"],Yt={__name:"Edit",props:{errors:Object,camps:Object,players:Object,filters:Object,campsOptions:Object,playersOptions:Object,transactions:Object,uniqueEvents:Object,uniquePlayers:Object,unAssignedCount:Number,allAssignedCount:Number,transactionsCount:Number,unAssignedByEventCount:Number,unAssignedByPlayerCount:Number,totalFailedTransactionsCount:Number,assignedByEventCount:Number,assignedByPlayerCount:Number},setup(n){const r=n,y=d(""),v=d(""),B=d(""),P=d(""),t=$({toDate:d(r.filters.toDate??""),fromDate:d(r.filters.fromDate??""),toAmount:d(r.filters.toAmount??""),fromAmount:d(r.filters.fromAmount??""),playerId:d(r.filters.playerId?parseInt(r.filters.playerId):""),eventId:d(r.filters.eventId?parseInt(r.filters.eventId):""),paginateBySize:d(r.filters.paginateBySize??100),allUnAssigned:d(r.filters.allUnAssigned??!1),unAssignedByEvent:d(r.filters.unAssignedByEvent??!1),unAssignedByPlayer:d(r.filters.unAssignedByPlayer??!1),allAssigned:d(r.filters.allAssigned??!1),assignedByPlayer:d(r.filters.assignedByPlayer??!1),assignedByEvent:d(r.filters.assignedByEvent??!1),orderByParam:d(""),orderBy:d("asc")}),_=i=>{t.orderBy=t.orderBy==="asc"?"desc":"asc",t.orderByParam=i,E()},k=()=>{t.eventId&&(P.value=r.uniqueEvents.find(i=>i.value===t.eventId).text),t.playerId&&(B.value=r.uniquePlayers.find(i=>i.value===t.playerId).text)};j(()=>{var i=document.querySelector(".modal-backdrop fade show");i&&i.parentNode.removeChild(i)}),L(()=>{k()}),M(t,()=>{k(),E()},{deep:!0});const E=()=>{T.get("/stripe/edit",t,{preserveState:!0,preserveScroll:!0,replace:!0})},U=()=>{t.eventId="",t.playerId="",t.fromDate="",t.toDate="",t.fromAmount="",t.toAmount="",t.paginateBySize=100,t.allUnAssigned=!1,t.unAssignedByEvent=!1,t.unAssignedByPlayer=!1,t.allAssigned=!1,t.assignedByPlayer=!1,t.assignedByEvent=!1},x=i=>i.user?`${i.user.first_name} ${i.user.last_name}`:"-",C=(i,l)=>{setTimeout(()=>{},10)},O=()=>{const i={eventId:t.eventId,playerId:t.playerId,camp_id:y.value,player_id:v.value,fromAmount:t.fromAmount,toAmount:t.toAmount,fromDate:t.fromDate,toDate:t.toDate,paginateBySize:t.paginateBySize,allUnAssigned:t.allUnAssigned,unAssignedByEvent:t.unAssignedByEvent,unAssignedByPlayer:t.unAssignedByPlayer,allAssigned:t.allAssigned,assignedByPlayer:t.assignedByPlayer,assignedByEvent:t.assignedByEvent};T.post(route("stripe.update"),i,{preserveScroll:!0,onSuccess:()=>Promise.all([])})};return(i,l)=>{const F=I("BackToList"),w=I("VueDatePicker");return f(),z(Q,{title:"Update Transactions"},{default:g(()=>[e("div",Z,[e("div",ee,[e("div",te,[e("div",se,[oe,e("div",le,[u(F,{backToListRoute:i.route("stripe.index"),class:"mr-1"},{default:g(()=>[c(" Back")]),_:1},8,["backToListRoute"])])]),e("div",ne,[e("form",{onSubmit:S(O,["prevent"])},[e("div",ae,[e("div",ie,[e("div",de,[re,u(h(b),{options:n.uniqueEvents,modelValue:t.eventId,"onUpdate:modelValue":l[0]||(l[0]=s=>t.eventId=s),placeholder:"Search Event"},null,8,["options","modelValue"])])]),e("div",ce,[e("div",ue,[me,u(h(b),{options:n.uniquePlayers,modelValue:t.playerId,"onUpdate:modelValue":l[1]||(l[1]=s=>t.playerId=s),placeholder:"Search Player"},null,8,["options","modelValue"])])]),e("div",pe,[e("div",_e,[ye,u(w,{position:"left","enable-time-picker":!1,modelValue:t.fromDate,"onUpdate:modelValue":l[2]||(l[2]=s=>t.fromDate=s),"auto-apply":"",placeholder:"From Date"},null,8,["modelValue"])])]),e("div",ve,[e("div",fe,[ge,u(w,{position:"left","enable-time-picker":!1,modelValue:t.toDate,"onUpdate:modelValue":l[3]||(l[3]=s=>t.toDate=s),"auto-apply":"",placeholder:"To Date"},null,8,["modelValue"])])]),e("div",he,[e("div",be,[Ae,m(e("input",{type:"number",placeholder:"From Amount","onUpdate:modelValue":l[4]||(l[4]=s=>t.fromAmount=s),class:"form-control"},null,512),[[V,t.fromAmount]])])]),e("div",Be,[e("div",Pe,[ke,m(e("input",{type:"number",placeholder:"To Amount","onUpdate:modelValue":l[5]||(l[5]=s=>t.toAmount=s),class:"form-control"},null,512),[[V,t.toAmount]])])]),e("div",Ee,[e("div",Ce,[we,m(e("select",{class:"form-control","onUpdate:modelValue":l[6]||(l[6]=s=>t.paginateBySize=s)},$e,512),[[q,t.paginateBySize]])])])]),e("div",je,[e("div",Le,[e("div",Me,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"allAssigned","onUpdate:modelValue":l[7]||(l[7]=s=>t.allAssigned=s),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[p,t.allAssigned]]),e("label",ze,"Assigned (Event & Player): "+a(n.allAssignedCount),1)])]),e("div",qe,[e("div",Re,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"assignedByEvent","onUpdate:modelValue":l[8]||(l[8]=s=>t.assignedByEvent=s),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[p,t.assignedByEvent]]),e("label",He,"Assigned (By Event): "+a(n.assignedByEventCount),1)])]),e("div",Ge,[e("div",Je,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"assignedByPlayer","onUpdate:modelValue":l[9]||(l[9]=s=>t.assignedByPlayer=s),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[p,t.assignedByPlayer]]),e("label",Ke,"Assigned (By Player): "+a(n.assignedByPlayerCount),1)])])]),e("div",Qe,[e("div",We,[e("div",Xe,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"allUnAssigned","onUpdate:modelValue":l[10]||(l[10]=s=>t.allUnAssigned=s),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[p,t.allUnAssigned]]),e("label",Ye,"Pending (Event & Player): "+a(n.unAssignedCount),1)])]),e("div",Ze,[e("div",et,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"unAssignedByEvent","onUpdate:modelValue":l[11]||(l[11]=s=>t.unAssignedByEvent=s),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[p,t.unAssignedByEvent]]),e("label",tt,"Pending (By Event): "+a(n.unAssignedByEventCount),1)])]),e("div",st,[e("div",ot,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"unAssignedByPlayer","onUpdate:modelValue":l[12]||(l[12]=s=>t.unAssignedByPlayer=s),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[p,t.unAssignedByPlayer]]),e("label",lt,"Pending (By Player): "+a(n.unAssignedByPlayerCount),1)])])]),e("div",nt,[e("div",at,[e("button",{class:"btn btn-primary waves-effect ml-1 waves-light",onClick:S(U,["prevent"])},"Reset Filters")])]),it,e("div",dt,[e("div",rt,[e("div",ct,[ut,u(h(b),{options:n.campsOptions,modelValue:y.value,"onUpdate:modelValue":l[13]||(l[13]=s=>y.value=s),placeholder:"Select Event",onBlur:l[14]||(l[14]=s=>C(i.index,i.item))},{default:g(({option:s})=>[e("span",null,a(s.text),1)]),_:1},8,["options","modelValue"])])]),e("div",mt,[e("div",pt,[_t,u(h(b),{options:n.playersOptions,modelValue:v.value,"onUpdate:modelValue":l[15]||(l[15]=s=>v.value=s),placeholder:"Select Player",onBlur:l[16]||(l[16]=s=>C(i.index,i.item))},{default:g(({option:s})=>[e("span",null,a(s.text),1)]),_:1},8,["options","modelValue"])])])]),e("div",yt,[u(W,{routeLink:i.route("stripe.index")},null,8,["routeLink"]),vt,e("button",{type:"submit",disabled:t.allAssigned==="true",class:"btn btn-primary waves-effect ml-1 waves-light"},"Update",8,ft)]),e("div",gt,[e("div",ht,[n.totalFailedTransactionsCount===n.allAssignedCount?(f(),A("div",bt," All transactions are now assigned. ")):R("",!0),e("div",At,[e("div",Bt,[Pt,c(a(n.totalFailedTransactionsCount)+" ",1),kt,c(a(n.transactionsCount)+" ",1),Et,c(a(n.allAssignedCount)+" ",1),Ct,c(a(n.unAssignedCount)+" ",1),wt,c(a(n.unAssignedByEventCount)+" ",1),Dt,c(a(n.unAssignedByPlayerCount),1)]),e("div",It,[u(N,{links:n.transactions.links},null,8,["links"])])]),e("div",St,[e("table",Vt,[e("thead",null,[e("tr",null,[Tt,e("th",{onClick:l[17]||(l[17]=s=>_("customer_email"))},[c("Customer Email "),Nt,Ut]),xt,Ot,e("th",{onClick:l[18]||(l[18]=s=>_("event_name"))},[c("Event Name (Old) "),Ft,$t]),e("th",{onClick:l[19]||(l[19]=s=>_("description"))},[c("Player Name (Old) "),jt,Lt]),Mt,e("th",{onClick:l[20]||(l[20]=s=>_("created_date"))},[c("Created Date "),zt,qt]),Rt,Ht,e("th",{onClick:l[21]||(l[21]=s=>_("amount"))},[c("Amount "),Gt,Jt]),Kt,Qt,Wt])]),e("tbody",null,[(f(!0),A(G,null,H(n.transactions.data,(s,D)=>(f(),A("tr",{key:D},[e("td",null,a(D+1),1),e("td",null,a(s.customer_email),1),e("td",null,a(s.camp.name??"-"),1),e("td",null,a(x(s.player)),1),e("td",null,a(s.event_name??"-"),1),e("td",null,a(s.description??"-"),1),e("td",{innerHTML:s.status_lebel},null,8,Xt),e("td",null,a(s.date_label),1),e("td",null,a(s.customer_id),1),e("td",null,a(s.invoice_number),1),e("td",null,a(s.amount),1),e("td",null,a(s.payment_intent_id),1),e("td",null,a(s.statement_descriptor),1),e("td",null,a(s.customer_description),1)]))),128))])])]),u(N,{links:n.transactions.links},null,8,["links"])])])],32)])])]),u(X,{propCampId:y.value,propPlayerId:v.value,propToAmount:t.toAmount,propFromAmount:t.fromAmount,propFromDate:t.fromDate,propToDate:t.toDate,propOldCampName:P.value,propOldPlayerName:B.value,propCamps:n.camps,propPlayers:n.players,errors:n.errors},null,8,["propCampId","propPlayerId","propToAmount","propFromAmount","propFromDate","propToDate","propOldCampName","propOldPlayerName","propCamps","propPlayers","errors"])])]),_:1})}}},cs=Y(Yt,[["__scopeId","data-v-4c3e55d0"]]);export{cs as default};
