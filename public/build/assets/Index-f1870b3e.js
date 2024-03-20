import{d as i,G as N,H as O,s as C,o as y,c as F,w as v,a as e,b as u,f as c,k as w,u as g,p as m,z as V,A as $,v as _,t as n,e as B,j as z,i as L,F as j,O as I,M,N as q}from"./app-39d70025.js";import{T as h}from"./VueSearchSelect-b5b246c8.js";import H from"./AppLayout-8558beb2.js";import{P as S}from"./Pagination-ad068362.js";import R from"./CancelButton-dfda4fd6.js";import{_ as G}from"./_plugin-vue_export-helper-c27b6911.js";import"./Banner-b2ab3b77.js";import"./Sidebar-0b209f3a.js";import"./Header-ef16f475.js";import"./DropdownLink-3a14777d.js";/* empty css                                                                   */const l=a=>(M("data-v-5ec008dd"),a=a(),q(),a),J={class:"row"},K={class:"col-md-12"},Q={class:"card"},W={class:"card-header"},X=l(()=>e("h4",{class:"pl-2"},[e("i",{class:"fas fa-edit"}),c(" Batch Update Transactions")],-1)),Y={class:"card-header-right"},Z={class:"card-body"},ee={class:"row mt-5"},se={class:"col-md-4"},te={class:"form-group"},oe=l(()=>e("label",{class:"col-form-label"},"Search Event",-1)),le={class:"col-md-4"},ne={class:"form-group"},ae=l(()=>e("label",{class:"col-form-label"},"Search Player",-1)),ie={class:"col-md-4"},de={class:"form-group"},re=l(()=>e("label",{class:"col-form-label"},"From Date",-1)),ce={class:"col-md-4"},ue={class:"form-group"},me=l(()=>e("label",{class:"col-form-label"},"To Date",-1)),_e={class:"col-md-4"},pe={class:"form-group"},ye=l(()=>e("label",{class:"col-form-label"},"From Amount",-1)),ve={class:"col-md-4"},ge={class:"form-group"},he=l(()=>e("label",{class:"col-form-label"},"To Amount",-1)),fe={class:"col-md-4"},be={class:"form-group"},Be=l(()=>e("label",{class:"col-form-label"},"Paginate By Size",-1)),Ae=l(()=>e("option",{value:""},"(none)",-1)),Pe=l(()=>e("option",{value:"10"},"10",-1)),ke=l(()=>e("option",{value:"100"},"100",-1)),Ee=l(()=>e("option",{value:"200"},"200",-1)),Ce=l(()=>e("option",{value:"300"},"300",-1)),we=l(()=>e("option",{value:"400"},"400",-1)),Ve=l(()=>e("option",{value:"500"},"500",-1)),Ie=l(()=>e("option",{value:"700"},"700",-1)),Se=l(()=>e("option",{value:"900"},"900",-1)),xe=l(()=>e("option",{value:"1000"},"1000",-1)),De=[Ae,Pe,ke,Ee,Ce,we,Ve,Ie,Se,xe],Te={class:"row mt-2"},Ue={class:"col-md-4"},Ne={class:"custom-control custom-checkbox"},Oe={class:"custom-control-label",for:"allAssigned"},Fe={class:"col-md-4"},$e={class:"custom-control custom-checkbox"},ze={class:"custom-control-label",for:"assignedByEvent"},Le={class:"col-md-4"},je={class:"custom-control custom-checkbox"},Me={class:"custom-control-label",for:"assignedByPlayer"},qe={class:"row mt-3"},He={class:"col-md-4"},Re={class:"custom-control custom-checkbox"},Ge={class:"custom-control-label",for:"allUnAssigned"},Je={class:"col-md-4"},Ke={class:"custom-control custom-checkbox"},Qe={class:"custom-control-label",for:"unAssignedByEvent"},We={class:"col-md-4"},Xe={class:"custom-control custom-checkbox"},Ye={class:"custom-control-label",for:"unAssignedByPlayer"},Ze={class:"row mt-3"},es={class:"col-md-12"},ss={class:"row mt-5"},ts={class:"col-md-12"},os={key:0,class:"alert alert-success text-center",role:"alert"},ls={class:"pagination-container"},ns={class:"total"},as=l(()=>e("label",null,"Total Failed Transactions:",-1)),is=l(()=>e("label",null,"Total (This Page):",-1)),ds=l(()=>e("label",null,"Total Assigned: (Event & Player)",-1)),rs=l(()=>e("label",null,"Total Pending (Event & Player):",-1)),cs=l(()=>e("label",null,"Total Pending (By Event):",-1)),us=l(()=>e("label",null,"Total Pending (By Player):",-1)),ms={class:"pagination"},_s={class:"table-responsive b-0","data-pattern":"priority-columns"},ps={class:"table table-xs table-striped"},ys=l(()=>e("th",null,"#",-1)),vs=l(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),gs=l(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),hs=l(()=>e("th",null,"Event Name (New)",-1)),fs=l(()=>e("th",null,"Player Name (New)",-1)),bs=l(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),Bs=l(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),As=l(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),Ps=l(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),ks=l(()=>e("th",null,"Status",-1)),Es=l(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),Cs=l(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),ws=l(()=>e("th",null,"Customer ID",-1)),Vs=l(()=>e("th",null,"Invoice Number",-1)),Is=l(()=>e("i",{class:"fas fa-long-arrow-alt-up"},null,-1)),Ss=l(()=>e("i",{class:"fas fa-long-arrow-alt-down"},null,-1)),xs=l(()=>e("th",null,"Payment Intent ID",-1)),Ds=l(()=>e("th",null,"Statement Descriptor",-1)),Ts=l(()=>e("th",null,"Customer Description",-1)),Us=["innerHTML"],Ns={class:"row mt-5"},Os={class:"col-md-6"},Fs={class:"form-group"},$s=l(()=>e("label",{class:"col-form-label"},"Select Event",-1)),zs={class:"col-md-6"},Ls={class:"form-group"},js=l(()=>e("label",{class:"col-form-label"},"Select Player",-1)),Ms={class:"form-group text-right mt-3"},qs=["disabled"],Hs={__name:"Index",props:{filters:Object,campsOptions:Object,playersOptions:Object,transactions:Object,uniqueEvents:Object,uniquePlayers:Object,unAssignedCount:Number,allAssignedCount:Number,transactionsCount:Number,unAssignedByEventCount:Number,unAssignedByPlayerCount:Number,totalFailedTransactionsCount:Number,assignedByEventCount:Number,assignedByPlayerCount:Number},setup(a){const d=a,f=i(""),b=i(""),s=N({toDate:i(d.filters.toDate),fromDate:i(d.filters.fromDate??""),toAmount:i(d.filters.toAmount??""),fromAmount:i(d.filters.fromAmount),playerId:i(d.filters.playerId?parseInt(d.filters.playerId):""),eventId:i(d.filters.eventId?parseInt(d.filters.eventId):""),paginateBySize:i(d.filters.paginateBySize??100),allUnAssigned:i(d.filters.allUnAssigned??!1),unAssignedByEvent:i(d.filters.unAssignedByEvent??!1),unAssignedByPlayer:i(d.filters.unAssignedByPlayer??!1),allAssigned:i(d.filters.allAssigned??!1),assignedByPlayer:i(d.filters.assignedByPlayer??!1),assignedByEvent:i(d.filters.assignedByEvent??!1),orderByParam:i(""),orderBy:i("asc")}),p=r=>{s.orderBy=s.orderBy==="asc"?"desc":"asc",s.orderByParam=r,A()};O(s,()=>{A()},{deep:!0});const A=()=>{I.get("/transactions/index",s,{preserveState:!0,preserveScroll:!0,replace:!0})},x=()=>{s.eventId="",s.playerId="",s.fromDate="",s.toDate="",s.fromAmount="",s.toAmount="",s.paginateBySize=100,s.allUnAssigned=!1,s.unAssignedByEvent=!1,s.unAssignedByPlayer=!1,s.allAssigned=!1,s.assignedByPlayer=!1,s.assignedByEvent=!1},D=r=>r.user?`${r.user.first_name} ${r.user.last_name}`:"-",P=(r,o)=>{setTimeout(()=>{},10)},T=()=>{const r={eventId:s.eventId,playerId:s.playerId,camp_id:f.value,player_id:b.value,fromAmount:s.fromAmount,toAmount:s.toAmount,fromDate:s.fromDate,toDate:s.toDate,paginateBySize:s.paginateBySize,allUnAssigned:s.allUnAssigned,unAssignedByEvent:s.unAssignedByEvent,unAssignedByPlayer:s.unAssignedByPlayer,allAssigned:s.allAssigned,assignedByPlayer:s.assignedByPlayer,assignedByEvent:s.assignedByEvent};I.post(route("transaction-batch.update"),r,{preserveScroll:!0,onSuccess:()=>Promise.all([])})};return(r,o)=>{const U=C("BackToList"),k=C("VueDatePicker");return y(),F(H,{title:"Batch Update Transactions"},{default:v(()=>[e("div",J,[e("div",K,[e("div",Q,[e("div",W,[X,e("div",Y,[u(U,{backToListRoute:r.route("stripe.index"),class:"mr-1"},{default:v(()=>[c(" Back")]),_:1},8,["backToListRoute"])])]),e("div",Z,[e("form",{onSubmit:w(T,["prevent"])},[e("div",ee,[e("div",se,[e("div",te,[oe,u(g(h),{options:a.uniqueEvents,modelValue:s.eventId,"onUpdate:modelValue":o[0]||(o[0]=t=>s.eventId=t),placeholder:"Search Event"},null,8,["options","modelValue"])])]),e("div",le,[e("div",ne,[ae,u(g(h),{options:a.uniquePlayers,modelValue:s.playerId,"onUpdate:modelValue":o[1]||(o[1]=t=>s.playerId=t),placeholder:"Search Player"},null,8,["options","modelValue"])])]),e("div",ie,[e("div",de,[re,u(k,{position:"left","enable-time-picker":!1,modelValue:s.fromDate,"onUpdate:modelValue":o[2]||(o[2]=t=>s.fromDate=t),"auto-apply":"",placeholder:"From Date"},null,8,["modelValue"])])]),e("div",ce,[e("div",ue,[me,u(k,{position:"left","enable-time-picker":!1,modelValue:s.toDate,"onUpdate:modelValue":o[3]||(o[3]=t=>s.toDate=t),"auto-apply":"",placeholder:"To Date"},null,8,["modelValue"])])]),e("div",_e,[e("div",pe,[ye,m(e("input",{type:"number",placeholder:"From Amount","onUpdate:modelValue":o[4]||(o[4]=t=>s.fromAmount=t),class:"form-control"},null,512),[[V,s.fromAmount]])])]),e("div",ve,[e("div",ge,[he,m(e("input",{type:"number",placeholder:"To Amount","onUpdate:modelValue":o[5]||(o[5]=t=>s.toAmount=t),class:"form-control"},null,512),[[V,s.toAmount]])])]),e("div",fe,[e("div",be,[Be,m(e("select",{class:"form-control","onUpdate:modelValue":o[6]||(o[6]=t=>s.paginateBySize=t)},De,512),[[$,s.paginateBySize]])])])]),e("div",Te,[e("div",Ue,[e("div",Ne,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"allAssigned","onUpdate:modelValue":o[7]||(o[7]=t=>s.allAssigned=t),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[_,s.allAssigned]]),e("label",Oe,"Assigned (Event & Player): "+n(a.allAssignedCount),1)])]),e("div",Fe,[e("div",$e,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"assignedByEvent","onUpdate:modelValue":o[8]||(o[8]=t=>s.assignedByEvent=t),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[_,s.assignedByEvent]]),e("label",ze,"Assigned (By Event): "+n(a.assignedByEventCount),1)])]),e("div",Le,[e("div",je,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"assignedByPlayer","onUpdate:modelValue":o[9]||(o[9]=t=>s.assignedByPlayer=t),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[_,s.assignedByPlayer]]),e("label",Me,"Assigned (By Player): "+n(a.assignedByPlayerCount),1)])])]),e("div",qe,[e("div",He,[e("div",Re,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"allUnAssigned","onUpdate:modelValue":o[10]||(o[10]=t=>s.allUnAssigned=t),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[_,s.allUnAssigned]]),e("label",Ge,"Pending (Event & Player): "+n(a.unAssignedCount),1)])]),e("div",Je,[e("div",Ke,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"unAssignedByEvent","onUpdate:modelValue":o[11]||(o[11]=t=>s.unAssignedByEvent=t),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[_,s.unAssignedByEvent]]),e("label",Qe,"Pending (By Event): "+n(a.unAssignedByEventCount),1)])]),e("div",We,[e("div",Xe,[m(e("input",{type:"checkbox",class:"custom-control-input",id:"unAssignedByPlayer","onUpdate:modelValue":o[12]||(o[12]=t=>s.unAssignedByPlayer=t),"data-parsley-multiple":"groups","data-parsley-mincheck":"2"},null,512),[[_,s.unAssignedByPlayer]]),e("label",Ye,"Pending (By Player): "+n(a.unAssignedByPlayerCount),1)])])]),e("div",Ze,[e("div",es,[e("button",{class:"btn btn-primary waves-effect ml-1 waves-light",onClick:w(x,["prevent"])},"Reset Filters")])]),e("div",ss,[e("div",ts,[a.totalFailedTransactionsCount===a.allAssignedCount?(y(),B("div",os," All transactions are now assigned. ")):z("",!0),e("div",ls,[e("div",ns,[as,c(n(a.totalFailedTransactionsCount)+" ",1),is,c(n(a.transactionsCount)+" ",1),ds,c(n(a.allAssignedCount)+" ",1),rs,c(n(a.unAssignedCount)+" ",1),cs,c(n(a.unAssignedByEventCount)+" ",1),us,c(n(a.unAssignedByPlayerCount),1)]),e("div",ms,[u(S,{links:a.transactions.links},null,8,["links"])])]),e("div",_s,[e("table",ps,[e("thead",null,[e("tr",null,[ys,e("th",{onClick:o[13]||(o[13]=t=>p("customer_email"))},[c("Customer Email "),vs,gs]),hs,fs,e("th",{onClick:o[14]||(o[14]=t=>p("event_name"))},[c("Event Name (Old) "),bs,Bs]),e("th",{onClick:o[15]||(o[15]=t=>p("description"))},[c("Player Name (Old) "),As,Ps]),ks,e("th",{onClick:o[16]||(o[16]=t=>p("created_date"))},[c("Created Date "),Es,Cs]),ws,Vs,e("th",{onClick:o[17]||(o[17]=t=>p("amount"))},[c("Amount "),Is,Ss]),xs,Ds,Ts])]),e("tbody",null,[(y(!0),B(j,null,L(a.transactions.data,(t,E)=>(y(),B("tr",{key:E},[e("td",null,n(E+1),1),e("td",null,n(t.customer_email),1),e("td",null,n(t.camp.name??"-"),1),e("td",null,n(D(t.player)),1),e("td",null,n(t.event_name??"-"),1),e("td",null,n(t.description??"-"),1),e("td",{innerHTML:t.status_lebel},null,8,Us),e("td",null,n(t.date_label),1),e("td",null,n(t.customer_id),1),e("td",null,n(t.invoice_number),1),e("td",null,n(t.amount),1),e("td",null,n(t.payment_intent_id),1),e("td",null,n(t.statement_descriptor),1),e("td",null,n(t.customer_description),1)]))),128))])])]),u(S,{links:a.transactions.links},null,8,["links"])])]),e("div",Ns,[e("div",Os,[e("div",Fs,[$s,u(g(h),{options:a.campsOptions,modelValue:f.value,"onUpdate:modelValue":o[18]||(o[18]=t=>f.value=t),placeholder:"Select Event",onBlur:o[19]||(o[19]=t=>P(r.index,r.item))},{default:v(({option:t})=>[e("span",null,n(t.text),1)]),_:1},8,["options","modelValue"])])]),e("div",zs,[e("div",Ls,[js,u(g(h),{options:a.playersOptions,modelValue:b.value,"onUpdate:modelValue":o[20]||(o[20]=t=>b.value=t),placeholder:"Select Player",onBlur:o[21]||(o[21]=t=>P(r.index,r.item))},{default:v(({option:t})=>[e("span",null,n(t.text),1)]),_:1},8,["options","modelValue"])])])]),e("div",Ms,[u(R,{routeLink:r.route("stripe.index")},null,8,["routeLink"]),e("button",{type:"submit",disabled:s.allAssigned==="true",class:"btn btn-primary waves-effect ml-1 waves-light"},"Update",8,qs)])],32)])])])])]),_:1})}}},tt=G(Hs,[["__scopeId","data-v-5ec008dd"]]);export{tt as default};
