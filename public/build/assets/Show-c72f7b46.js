import{_ as c}from"./AppLayout-5f8bd21c.js";import p from"./DeleteUserForm-6b8f18b5.js";import l from"./LogoutOtherBrowserSessionsForm-8638c34a.js";import{S as s}from"./SectionBorder-caac3367.js";import f from"./TwoFactorAuthenticationForm-527fb92d.js";import u from"./UpdatePasswordForm-68b009b4.js";import _ from"./UpdateProfileInformationForm-8b1fa940.js";import{o,c as d,w as n,a as i,e as r,b as t,j as a,F as h}from"./app-bbe1c370.js";import"./Banner-738fcd90.js";import"./DropdownLink-6a8d23f0.js";import"./DialogModal-2f6ddb20.js";import"./SectionTitle-a1056894.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DangerButton-da0f3b4d.js";import"./SecondaryButton-42aae86a.js";import"./ActionMessage-36eddf2d.js";import"./PrimaryButton-0a7a8eac.js";import"./FormSection-fced0f0b.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};