<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Services\MailService;
use Illuminate\Http\Request;
use Route;

class WebsiteController extends Controller
{


    /**
     * @var MailService
     */
    private $mailService;

    function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }


    public function sluggify($name)
    {
        return str_replace(',','_',str_replace('&','_',str_replace(' ','',$name)));

    }

    public function home()
    {

        $global_partners = [
            0 => [
                'logo' => 'mahindra',
                'alt' => 'Mahindra',
            ],
            1 => [
                'logo' => 'Siemens-Energy',
                'alt' => 'Siemens Energy',
            ],
            2 => [
                'logo' => 'Nagar-Panchayat',
                'alt' => 'Nagar Panchayat Chindwada, MP',
            ],
            3 => [
                'logo' => 'reliance',
                'alt' => 'Reliance',
            ],
            4 => [
                'logo' => 'Evoqua-Water-Technologies',
                'alt' => 'Evoqua Water Technologies',
            ],
            5 => [
                'logo' => 'ONGC',
                'alt' => 'ONGC',
            ],
            6 => [
                'logo' => 'Lodha',
                'alt' => 'Lodha',
            ],
            7 => [
                'logo' => 'HP',
                'alt' => 'HP',
            ],
            8 => [
                'logo' => 'LnT',
                'alt' => 'L&T',
            ],
            9 => [
                'logo' => 'Godrej',
                'alt' => 'Godrej',
            ],
            10 => [
                'logo' => 'Uttam',
                'alt' => 'Uttam',
            ],
        ];
        return view('web_pages.home-v1')->with(['global_partners'=>$global_partners]);
    }

    public function careers()
    {
        return view('web_pages.careers');
    }

    public function productSupport()
    { 
        return view('web_pages.product_support');
    }

    public function careersPost(Requests\StoreCareerRequest $storeCareerRequest)
    {
        $data = [
            'name' => $storeCareerRequest['name'],
            'email' => $storeCareerRequest['email'],
            'position_applied_for' => $storeCareerRequest['position_applied_for'],
            'phone' => $storeCareerRequest['phone'],
        ];

        if (!empty($storeCareerRequest['current_designation']) && !empty($storeCareerRequest['current_working'])) {
            $data['current_designation'] = $storeCareerRequest['current_designation'];
            $data['current_working'] = $storeCareerRequest['current_working'];
        }


       $sendToEmail = 'info@sparklecleantech.com';
        /*$sendToEmail = 'saurabh.pralhad.ghule@gmail.com';*/


        if ($storeCareerRequest->hasFile('upload_resume')) {
            $uploadedResume = $storeCareerRequest->file('upload_resume');
            $fileName = time() . '.' . $uploadedResume->getClientOriginalExtension();
            $savedResume = $uploadedResume->move('resume', $fileName);

            Mail::send('emails.job_application', ['data' => $data], function ($message) use ($sendToEmail, $data, $storeCareerRequest, $fileName) {
                $message->to($sendToEmail)->subject('New Enquiry : Careers Page');
                $message->attach('resume/' . $fileName);
            });

            $useremail = $storeCareerRequest['email'];

            Mail::send('emails.job_acknowledgement', ['data' => $data,'useremail' => '$useremail'], function ($message) use ($sendToEmail, $data, $useremail) {
                $message->to($useremail)->subject('Sparkle Clean Tech Acknowledgement for Job Application');
            });

        } else {
            Mail::send('emails.job_application', ['data' => $data], function ($message) use ($sendToEmail, $data, $storeCareerRequest) {
                $message->to($sendToEmail)->subject('New Enquiry : Careers Page');
            });

            $useremail = $storeCareerRequest['email'];


            Mail::send('emails.job_acknowledgement', ['data' => $data,'useremail' => '$useremail'], function ($message) use ($sendToEmail, $data, $useremail) {
                $message->to($useremail)->subject('Sparkle Clean Tech Acknowledgement for Job Application');
            });
        }

        return response()->json(['status' => 'success'], 200);
    }

    public function team()
    {
        $management_teamMembers = [
            'Sumeet Mehra' => [
                'image' => 'sumeet_mehra',
                'designation' => 'President & CEO',
                'email' => 'sumeet@sparklecleantech.com',
                'description' => [
                    0 => 'Before  joining Sparkle, Sumeet  had been  Executive Director at  SSM Ltd., a publicly traded company in India.  Appointed as Chief Executive Officer in 1998, he soon joined its Board of Directors  in 1999. Under his able leadership, SSM successfully implemented  water recycling systems and effluent treatment plants for reusing textile  wastewater, a concept that  soon  gained widespread  recognition in the industry. With his 24 years of experience,  he continues to customize and  innovate systems dealing with   water use efficiency.  A philanthropist by nature, he offers his honorary services to  two non-profit organizations devoted to the cause of  advancing youth in business and addressing poverty in Mumbai.',
                    1 => 'Sumeet received his Bachelor of Commerce from Sydenham College of Commerce and Economics   and  a Business Degree at Harvard University.'
                ]
            ],
            'Parthivv Trivedi' => [
                'image' => 'parthivv_trivedi',
                'designation' => 'Vice President - Marketing & Projects',
                'email' => 'parthivv@sparklecleantech.com',
                'description' => [
                    0 => 'Parthivv, a Chemical Engineer,  has more than three decades of  experience in the fields of water and waste water treatment. Over  these years, he has handled   sales,  services and projects.  During his career span, he has worked  with  companies like Thermax and others.',
                    1 => 'Parthivv, in past, headed the Western  Region operations of a venture, and  became instrumental in accelerating its   growth in the region.'
                ]
            ],
            'Chetan Shah' => [
                'image' => 'chetan_shah',
                'designation' => 'Vice President – Finance & Accounts',
                'email' => 'chetan@sparklecleantech.com',
                'description' => [
                    0 => 'Chetan has over 20 years of experience in a diverse range of industries such as  Manufacturing, Technology, Investment and Retail. His extensive experience is in both strategic and operational areas like Business Planning and Budgeting, Business valuation, Due diligence, Financial and Management Accounting',
                    1 => 'Chetan is a qualified Chartered Accountant  and had received his  Bachelor of Commerce at University  of  Mumbai.'
                ]
            ]
        ];
        $functional_teamMembers = [
            'Ajaykumar A. Sharma' => [
                'image' => 'ajaykumar_sharma',
                'designation' => 'Sr. Manager -Sales',
                'email' => 'ajay@sparklecleantech.com',
                'description' => [
                    0 => 'Ajaykumar has around 12 years of experience in technical sales of water and waste water solutions. An ex-Ion Exchange personnel, he has also  worked  with  other water treatment companies.',
                    1 => 'Ajaykumar holds a Bachelor in Science along with a Postgraduate Diploma in Environmental Engineering and Environmental Health and Safety.',
                    2 => 'At Sparkle, Ajaykumar is spearheading  sales for institutional and infrastructure segments.'
                ]
            ],
            'Ashish Davale' => [
                'image' => 'ashish_davale',
                'designation' => 'Sr. Manager - Product (Water Treatment Plant)',
                'email' => 'ashish@sparklecleantech.com',
                'description' => [
                    0 => 'Ashish Davale has over 16 years of experience in water treatment services, detailed engineering and waste water treatment plant designing. He holds an  Advanced Engineering Diploma in Water Quality Management.',
                    1 => 'He was formerly  employed  in various capacities at   Ion Exchange India Limited, Praj Hi-Purity Systems Limited and Eureka Forbes Limited.',
                    2 => 'At Sparkle, Ashish is looking after the water treatment vertical and has been involved in process engineering, proposal making, design engineering and executing assignments.'
                ]
            ],
            'Deepak Ganorkar' => [
                'image' => 'deepak_ganorkar',
                'designation' => 'Sr.Manager - Project (Engineering)',
                'email' => 'deepak@sparklecleantech.com',
                'description' => [
                    0 => 'Deepak holds a Bachelor’s degree in Mechanical Engineering  and has worked with companies like Seion Water Inc and VA Tech Wabag. He has 8 years of experience in water and wastewater engineering.',
                    1 => 'At Sparkle, Deepak  is involved in design engineering, designing of rotary & static equipment, skids / Process skids Fabrication and manufacturing of water and waste water treatment plants at  the factory.',
                ]
            ],
            // 'Dominic J. D’souza' => [
            //     'image' => 'dominic_dsouza',
            //     'designation' => 'Sr. Manager - Construction',
            //     'email' => 'dominic@sparklecleantech.com',
            //     'description' => [
            //         0 => 'Dominic has 25 years of experience in Water Treatment, Mechanical, Electrical and Refrigeration systems. He has a   Diploma in Mechanical Engineering.',
            //         1 => 'He has occupied various senior positions in past :  Manager - Project, Sales,  and Team Leader (Projects). He has worked with some of the most  reputed  companies such as  Pennar Enviro Ltd. Hyderabad, Eureka Forbes Ltd., and Ion Exchange (I) Ltd (International Division).',
            //         2 => 'At Sparkle, Dominic is heading the large turnkey projects execution. He provides interface between Sparkle and clients including vendors and third party inspection agencies.'
            //     ]
            // ],
            'Mahesh Giram' => [
                'image' => 'mahesh_giram',
                'designation' => 'Manager – Sales',
                'email' => 'mahesh@sparklecleantech.com',
                'description' => [
                    0 => 'Mahesh has around 17 years of experience in the field of water and wastewater solutions. He holds a bachelor’s degree in Production Engineering.',
                    1 => 'Prior to joining Sparkle, Mahesh has held various positions, including senior level positions in companies like Praj Hi-Purity Systems Ltd, Ion Exchange India Ltd.',
                    2 => 'At Sparkle, Mahesh is spearheading sales of Water Treatment Plants such as Filters, Softeners, Ultra-filtration Plants, Reverse Osmosis Plants, Sewage Treatment Plants and Effluent Treatment Plants for Industrial segments like F&B, Steel, Pharma, Fisheries etc.'
                ]
            ],
            'Narendra Ingale' => [
                'image' => 'narendra_ingale',
                'designation' => 'Sr. Technical Manager(Quality Control)',
                'email' => 'narendra@sparklecleantech.com',
                'description' => [
                    0 => 'Narendra holds a Master’s degree in Science. He has over 22 years of technical experience in water treatment, water testing (Chemical, Microbiological), system validation ISO-9001, NABL requirement and Water quality IS: -10500, IS: - 14543 - Package drinking water.',
                    1 => 'Before joining Sparkle, he was  with a water treatment company. He has also worked for a food and water testing laboratory ( NABL accredited) and Ashalini Laboratory.',
                    2 => 'Narendra leads  the Sparkle laboratory set up, ISO implementation and  heads the unit .'
                ]
            ],
            'Pradip Mankame' => [
                'image' => 'pradip_mankame',
                'designation' => 'Assistant General Manager',
                'email' => 'pradip@sparklecleantech.com',
                'description' => [
                    0 => 'Pradip is In-Charge of Sparkle Factory. He has over 33 years of experience in the field of factory administrative and legal activities. Before joining Sparkle, he has  held various senior positions such as the  Head of Department , Project Manager and others with Subhash Silk Mills Ltd.',
                    1 => 'Pradip holds a Bachelor degree in Science (Chemistry) and  a Diploma in Textile (W.M.M.F.F).',
                ]
            ],
            'Sandeep Shankar Ghatge' => [
                'image' => 'sandeep_ghatge',
                'designation' => 'Sr. Manager - Service & Operation',
                'email' => 'sandeep@sparklecleantech.com',
                'description' => [
                    0 => 'Sandeep has over 12 years of experience in Execution of Effluent treatment plant (ETP), Sewage treatment plant (STP) and Water treatment plant (WTP). Prior joining to Sparkle he has worked with Environmental Consultants and leading water and waste water companies.',
                    1 => 'Sandeep is a Postgraduate in Environmental Pollution Control Technology from Garware Institute, Industrial & Analytical Chemistry from Ruia College. He  has an  Advanced Diploma in Industrial Safety, Health & Environment from MSBTE.',
                    2 => 'Sandeep is heading the Service, O & M Department at Sparkle.'
                ]
            ],
            'Shwetan P. Kulkarni' => [
                'image' => 'shwetan_kulkarni',
                'designation' => 'Sr. Manager - Products (Wastewater Treatment)',
                'email' => 'shwetan@sparklecleantech.com',
                'description' => [
                    0 => 'Shwetan is a graduate in Chemistry from  University of Mumbai. He completed his Masters in Science specializing in  Pollution Control from IIEE, New Delhi. He holds a Postgraduate Diploma  in Environmental Pollution Control Technology from University of Mumbai and an  Advanced Diploma in Industrial Safety from Maharashtra State Board of Technical Education.',
                    1 => 'Shwetan has  held various positions  including the  senior level positions in  water treatment companies. He has over 12 years of experience in planning, designing & execution of wastewater treatment projects, right  from their concept to commissioning stages, while  keeping himself  updated with  the latest  technologies in wastewater treatments.',
                    2 => 'Shwetan is looking after the waste water treatment-vertical, and has been involved in process engineering, proposal making, design engineering and executing assignments.'
                ]
            ],
            'Yogesh Berde' => [
                'image' => 'yogesh_berde',
                'designation' => 'Head Projects & Planning',
                'email' => 'yogesh.berde@sparklecleantech.com',
                'description' => [
                    0 => 'Yogesh has 19 years of vast experience in handling various turnkey projects in water & waste water treatment. He holds a bachelor’s degree in Production with PGDBA in Marketing. ',
                    1 => 'He has occupied various senior positions in the past: Project In charge and Manager – Projects. He has worked with some of the most reputed companies such as Wipro Water, Jaldhara Technologies Pvt. Ltd., and Thermax Ltd., Pune.',
                    2 => 'At Sparkle, Yogesh is heading the large turnkey project execution. He provides an interface between Sparkle and clients including vendors and third-party inspection agencies.'
                ]
            ],
        ];

        return view('web_pages.team', [
            'management_teamMembers' => $management_teamMembers,
            'functional_teamMembers' => $functional_teamMembers,
        ]);
    }

    public function about()
    {
        return view('web_pages.about');
    }

    public function quality()
    {
        return view('web_pages.quality');
    }


    public function contact()
    {
        return view('web_pages.contact');
    }

    public function contactPost(Requests\StoreContactRequest $storeContactRequest)
    {
        $data = [
            'name' => $storeContactRequest['name'],
            'email' => $storeContactRequest['email']
        ];

        $data['company_name'] = isset($storeContactRequest['company_name']) ? $storeContactRequest['company_name'] : null;
        $data['phone'] = isset($storeContactRequest['phone']) ? $storeContactRequest['phone'] : null;
        $data['solution_options'] = isset($storeContactRequest['solution_options']) ? $storeContactRequest['solution_options'] : null;
        $data['message'] = isset($storeContactRequest['message']) ? $storeContactRequest['message'] : null;

        /*$sendToEmail = 'saurabh.pralhad.ghule@gmail.com';*/
       $sendToEmail = 'info@sparklecleantech.com';


        Mail::send('emails.contactpage_request', ['data' => $data], function ($message) use ($sendToEmail, $data, $storeContactRequest) {
            $message->to($sendToEmail)->subject('New Enquiry : Contact Page');
        });

        $useremail = $storeContactRequest['email'];

        Mail::send('emails.job_acknowledgement', ['data' => $data,'useremail' => '$useremail'], function ($message) use ($sendToEmail, $data, $useremail) {
            $message->to($useremail)->subject('Sparkle Clean Tech Acknowledgement');
        });

        return response()->json(['status' => 'success'], 200);
    }


    public function productSupportPost(Requests\StoreContactRequest $storeContactRequest)
    {  
        $data = [
            'name' => $storeContactRequest['name'],
            'email' => $storeContactRequest['email']
        ];

        $data['company_name'] = isset($storeContactRequest['company_name']) ? $storeContactRequest['company_name'] : null;
        $data['department'] = isset($storeContactRequest['department']) ? $storeContactRequest['department'] : null;
        $data['phone'] = isset($storeContactRequest['phone']) ? $storeContactRequest['phone'] : null;
        $data['address'] = isset($storeContactRequest['address']) ? $storeContactRequest['address'] : null;
        $data['state'] = isset($storeContactRequest['state']) ? $storeContactRequest['state'] : null;
        $data['city'] = isset($storeContactRequest['city']) ? $storeContactRequest['city'] : null;
        $data['zip'] = isset($storeContactRequest['zip']) ? $storeContactRequest['zip'] : null;
        $data['machine_no'] = isset($storeContactRequest['machine_no']) ? $storeContactRequest['machine_no'] : null;
        $data['machine_location'] = isset($storeContactRequest['machine_location']) ? $storeContactRequest['machine_location'] : null;
        $data['machine_type'] = isset($storeContactRequest['machine_type']) ? $storeContactRequest['machine_type'] : null;
        $data['issue'] = isset($storeContactRequest['issue']) ? $storeContactRequest['issue'] : null;
        $data['other_issue'] = isset($storeContactRequest['other_issue']) ? $storeContactRequest['other_issue'] : null;
        $data['message'] = isset($storeContactRequest['message']) ? $storeContactRequest['message'] : null;

         $sendToEmail = 'info@sparklecleantech.com';
        //$sendToEmail = 'roshan.sachan@speakinglamp.com';

        Mail::send('emails.product_support_template', ['data' => $data], function ($message) use ($sendToEmail, $data, $storeContactRequest) {
            $message->to($sendToEmail)->subject('New Enquiry : Product Support');
        });

        $useremail = $storeContactRequest['email'];

        Mail::send('emails.job_acknowledgement', ['data' => $data,'useremail' => '$useremail'], function ($message) use ($sendToEmail, $data, $useremail) {
            $message->to($useremail)->subject('Sparkle Clean Tech Acknowledgement');
        });

        return response()->json(['status' => 'success'], 200);
    }


    public function ourReach()
    {
        $indian_clients = [
            'IN-AP' => [
                'Construction & Infrastructure' => [
                    0 => [
                        'client_name' => 'Megha Engineering & Infrastructures Ltd.',
                        'client_logo' => '5'
                    ],
                ],
            ],
            'IN-GA' => [
                'Hospitality' => [
                    0 => [
                        'client_name' => 'Victor Hotels & Motels Ltd.',
                    ],
                ],
                'Pharmaceuticals & Hospitals' => [
                    0 => [
                        'client_name' => 'NUSI Hospital',
                        'client_logo' => '1'
                    ],
                    1 => [
                        'client_name' => 'CIPLA',
                        'client_logo' => '4'
                    ],
                ],
            ],
            'IN-GJ' => [
                'Oil, Gas & Refinery' => [
                    0 => [
                        'client_name' => 'Oil & Natural Gas Corporation Ltd.',
                        'client_logo' => '6'
                    ],
                    1 => [
                        'client_name' => 'British Petroleum',
                        'client_logo' => '5'
                    ],
                    2 => [
                        'client_name' => 'Total Oil India Ltd.',
                        'client_logo' => '4'
                    ],
                    3 => [
                        'client_name' => 'Schlumberger Asia Services Ltd.',
                        'client_logo' => '3'
                    ],
                ],
                'Power & Energy' => [
                    0 => [
                        'client_name' => 'Siemens Energy',
                        'client_logo' => '2'
                    ],
                ],
            ],
            'IN-KA' => [
                'Automobile' => [
                    0 => [
                        'client_name' => 'Mahindra',
                        'client_logo' => 'mahindra'
                    ],
                    1 => [
                        'client_name' => 'Mann Hummel',
                        'client_logo' => 'mann_hummel'
                    ],
                ],
                'Renewables & Environment' => [
                    0 => [
                        'client_name' => '​UEM India Pvt. Ltd.',
                        'client_logo' => '4'
                    ],
                ],
                'Others' => [
                    0 => [
                        'client_name' => 'BDK India',
                        'client_logo' => '18'
                    ],
                ],
            ],
            'IN-KL' => [
                'Hospitality' => [
                    0 => [
                        'client_name' => 'Indo Pacific Hotels Ltd.',
                        /*'client_logo' => 'taj'*/
                    ],
                ],
            ],
            'IN-MP' => [
                'Construction & Infrastructure' => [
                    0 => [
                        'client_name' => 'Gammon India Ltd.',
                        'client_logo' => 'gammon'
                    ],
                ],
                'Govt & Municipal Corporation' => [
                    0 => [
                        'client_name' => 'PHED MP',
                        /*'client_logo' => 'midc'*/
                    ],
                ],
            ],
            'IN-MH' => [
                'Construction & Infrastructure' => [
                    0 => [
                        'client_name' => 'ABIL',
                        'client_logo' => 'abil'
                    ],
                    1 => [
                        'client_name' => 'B.G. Shirke Construction Technology Pvt. Ltd.',
                        'client_logo' => '12'
                    ],
                    2 => [
                        'client_name' => 'Garnet Construction Ltd.',
                        'client_logo' => '11'
                    ],
                    3 => [
                        'client_name' => 'Infinity Developers',
                        'client_logo' => '7'
                    ],
                    4 => [
                        'client_name' => 'Jangid Construction',
                        'client_logo' => '8'
                    ],
                    5 => [
                        'client_name' => 'K Raheja Foundation',
                        /*'client_logo' => 'soham'*/
                    ],
                    6 => [
                        'client_name' => 'Kalpataru Ltd.',
                        'client_logo' => '14'
                    ],
                    7 => [
                        'client_name' => 'L&T',
                        'client_logo' => '15'
                    ],
                    8 => [
                        'client_name' => 'Omkar Realtors & Developers Pvt. Ltd.',
                        'client_logo' => '13'
                    ],
                    9 => [
                        'client_name' => 'RNA Corp Ltd.',
                        'client_logo' => '4'
                    ],
                    10 => [
                        'client_name' => 'The Wadhwa Group',
                        'client_logo' => '2'
                    ],
                    11 => [
                        'client_name' => 'Top Worth Pipes & Tubes Pvt. Ltd.',
                        'client_logo' => '1'
                    ],
                    12 => [
                        'client_name' => 'Writer Realty',
                        /*'client_logo' => 'laksel'*/
                    ],
                ],
                'Govt & Municipal Corporation' => [
                    0 => [
                        'client_name' => 'MIDC',
                        'client_logo' => '2'
                    ],
                    1 => [
                        'client_name' => 'BMC',
                        'client_logo' => '1'
                    ],
                ],
                'Hospitality' => [
                    0 => [
                        'client_name' => 'TAJ Group of Hotels',
                        'client_logo' => '7'
                    ],
                    1 => [
                        'client_name' => 'Panoramic Group',
                        'client_logo' => '5'
                    ],
                    2 => [
                        'client_name' => 'Adlabs Entertainment Ltd.',
                        'client_logo' => '3'
                    ],
                    3 => [
                        'client_name' => 'Ginger Hotel',
                        'client_logo' => '1'
                    ],
                    4 => [
                        'client_name' => 'Hotel Sai Sahawas, Shirdi',
                        'client_logo' => '2'
                    ],
                    5 => [
                        'client_name' => 'Makewaves Sea Resort Pvt. Ltd.',
                        'client_logo' => '6'
                    ],
                ],
                'Oil, Gas & Refinery' => [
                    0 => [
                        'client_name' => 'British Petroleum',
                        'client_logo' => '5'
                    ],
                    1 => [
                        'client_name' => 'Total Oil India Ltd.',
                        'client_logo' => '4'
                    ],
                    2 => [
                        'client_name' => 'Schlumberger Asia Services Ltd.',
                        'client_logo' => '3'
                    ],
                ],
                'Pharmaceuticals & Hospitals' => [
                    0 => [
                        'client_name' => 'D. K. Pharma Chem Pvt. Ltd.',
                        'client_logo' => '3'
                    ],
                    1 => [
                        'client_name' => 'Wockhardt',
                        'client_logo' => '2'
                    ],
                ],
                'Power & Energy' => [
                    0 => [
                        'client_name' => 'BGR Energy',
                        'client_logo' => '1'
                    ],
                ],
                'Renewables & Environment' => [
                    0 => [
                        'client_name' => 'Good Life Products',
                    ],
                    1 => [
                        'client_name' => 'KWAN Enviornmental Solutions India Pvt. Ltd.',
                        'client_logo' => '2'
                    ],
                    2 => [
                        'client_name' => 'Aquachem Enviro Engg Pvt. Ltd',
                        'client_logo' => '1'
                    ],
                ],
                'Residential & Housing' => [
                    0 => [
                        'client_name' => 'Juhu Real Estate Developers Pvt. Ltd.',
                    ],
                    1 => [
                        'client_name' => 'Keystone Realtors Pvt. Ltd.',
                        'client_logo' => '1'
                    ],
                    2 => [
                        'client_name' => 'Raiaskaran-Ecstasy Reality Pvt. Ltd.',
                        'client_logo' => '2'
                    ],
                    3 => [
                        'client_name' => 'Rustomjee-Suranjan Holding and Estate Developers Pvt. Ltd.',
                    ],
                    4 => [
                        'client_name' => 'Sai Balaji Developers',
                    ],
                    5 => [
                        'client_name' => 'Worthwhile Properties Pvt. Ltd.',
                    ],
                ],
                'Textile' => [
                    0 => [
                        'client_name' => 'Sudar Garments Ltd.',
                        'client_logo' => '3'
                    ],
                    1 => [
                        'client_name' => 'Esstee Exports',
                        'client_logo' => '1'
                    ],
                    2 => [
                        'client_name' => 'Lavino Kapur',
                        'client_logo' => '2'
                    ],
                ],
                'Others' => [
                    0 => [
                        'client_name' => 'Prime ABGB Pvt. Ltd.',
                        'client_logo' => '7'
                    ],
                ],
            ],
            'IN-RJ' => [
                'Construction & Infrastructure' => [
                    0 => [
                        'client_name' => 'Tejasvi Construction',
                        /*'client_logo' => 'wadhwa'*/
                    ],
                ],
            ],
            'IN-TN' => [
                'Construction & Infrastructure' => [
                    0 => [
                        'client_name' => 'Green Chem Solutions Pvt. Ltd.',
                        'client_logo' => '10'
                    ],
                ],
                'Textile' => [
                    0 => [
                        'client_name' => 'Esstee Exports',
                        'client_logo' => '1'
                    ],
                ],
            ],
            'IN-WB' => [
                'Govt & Municipal Corporation' => [
                    0 => [
                        'client_name' => 'Eastern Railway, Kolkata',
                        'client_logo' => '4'
                    ],
                ],
            ],
        ];

        $foreign_clients = [
            'AE' => [
                'client_country' => 'UAE',
                'others' => [
                    0 => [
                        'client_name' => 'Hycor Utilities LLC',
                        'client_logo' => 'hycor'
                    ],
                ],
            ],
            'SG' => [
                'client_country' => 'SINGAPORE',
                'others' => [
                    0 => [
                        'client_name' => 'Evoqua Water Technologies',
                        'client_logo' => 'evoqua'
                    ],
                ],
            ],
            'IT' => [
                'client_country' => 'ITALY',
                'others' => [
                    0 => [
                        'client_name' => 'Rosa Micro SRL',
                    ],
                ],
            ],
            'MY' => [
                'client_country' => 'MALAYSIA',
                'others' => [
                    0 => [
                        'client_name' => 'Indorama Corporation',
                        'client_logo' => 'indorama'
                    ],
                    1 => [
                        'client_name' => 'United Breweries',
                        'client_logo' => 'ub'
                    ],
                ],
            ],
            'PH' => [
                'client_country' => 'PHILIPPINES',
                'others' => [
                    0 => [
                        'client_name' => 'Prime Water',
                        'client_logo' => 'prime-water'
                    ],
                ],
            ]
        ];


        return view('web_pages.our-reach')->with([
            'indian_clients' => $indian_clients,
            'foreign_clients' => $foreign_clients,
        ]);
    }

    public function clientsAndConsultants()
    {
        $clients_and_consultants = [
            'Automobile' => [
                0 => [
                    'client_name' => 'Mahindra',
                    'client_logo' => 'mahindra.jpg'
                ],
                1 => [
                    'client_name' => 'Mann Hummel',
                    'client_logo' => 'mann_hummel.jpg'
                ],
                2 => [
                    'client_name' => 'Lucas TVS',
                    'client_logo' => 'lucas-tvs.jpg'
                ],
            ],
            'Construction & Infrastructure' => [
                0 => [
                    'client_name' => 'Top Worth Pipes & Tubes Pvt. Ltd.',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'The Wadhwa Group',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Structwel Designers & Consultants Pvt. Ltd.',
                    'client_logo' => '3.jpg'
                ],
                3 => [
                    'client_name' => 'RNA Corp Ltd.',
                    'client_logo' => '4.jpg',
                ],
                4 => [
                    'client_name' => 'Megha Engineering & Infrastructure Pvt Ltd',
                    'client_logo' => '5.jpg'
                ],
                5 => [
                    'client_name' => 'Lodha',
                    'client_logo' => '6.jpg'
                ],
                6 => [
                    'client_name' => 'Infinity',
                    'client_logo' => '7.jpg'
                ],
                7 => [
                    'client_name' => 'Jangid Group',
                    'client_logo' => '8.jpg'
                ],
                8 => [
                    'client_name' => 'Hiranandani',
                    'client_logo' => '9.jpg'
                ],
                9 => [
                    'client_name' => 'Green Chem Solutions Pvt. Ltd.',
                    'client_logo' => '10.jpg'
                ],
                10 => [
                    'client_name' => 'Garnet Construction Ltd.',
                    'client_logo' => '11.jpg'
                ],
                11 => [
                    'client_name' => 'Shirke Group of Companies',
                    'client_logo' => '12.jpg'
                ],
                12 => [
                    'client_name' => 'Omkar',
                    'client_logo' => '13.jpg'
                ],
                13 => [
                    'client_name' => 'Kalpa Taru',
                    'client_logo' => '14.jpg'
                ],
                14 => [
                    'client_name' => 'L&T',
                    'client_logo' => '15.jpg'
                ],
                15 => [
                    'client_name' => 'Reliance',
                    'client_logo' => '16.jpg'
                ],
                16 => [
                    'client_name' => 'Tejasvi Construction',
                ],
                17 => [
                    'client_name' => 'Writer Realty',
                ],
            ],
            'Consultants' => [
                0 => [
                    'client_name' => 'Mott MacDonald',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'ETA Engineering Pvt. Ltd',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Semac Consultants Pvt. Ltd',
                    'client_logo' => '3.jpg'
                ],
                3 => [
                    'client_name' => 'Pankaj Dharkar Associates',
                    'client_logo' => '4.jpg'
                ],
                4 => [
                    'client_name' => 'MEP',
                    'client_logo' => '5.jpg'
                ],
                5 => [
                    'client_name' => 'Electro – Mech Consultant',
                    'client_logo' => '6.jpg'
                ],
                6 => [
                    'client_name' => 'AECOM',
                    'client_logo' => '7.jpg'
                ],
                7 => [
                    'client_name' => 'TATA Consulting Engineers Limited',
                    'client_logo' => '8.jpg'
                ],
                8 => [
                    'client_name' => 'Sterling & Wilson Ltd.',
                    'client_logo' => '9.jpg'
                ],
                9 => [
                    'client_name' => 'Integrated Technical Services',
                ],
                10 => [
                    'client_name' => 'Epicon Consultant',
                ],
                11 => [
                    'client_name' => 'R P Engineering',
                ],
                12 => [
                    'client_name' => 'P. S. PMC',
                ]
            ],
            'Govt & Municipal Corporation' => [
                0 => [
                    'client_name' => 'BMC',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'MIDC',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Nagar Panchayat Chindwada, MP',
                    'client_logo' => '3.jpg'
                ],
                3 => [
                    'client_name' => 'Eastern Railway, Kolkata',
                    'client_logo' => '4.jpg'
                ],
                4 => [
                    'client_name' => 'PHED MP',
                ],
            ],
            'Hospitality' => [
                0 => [
                    'client_name' => 'Ginger Hotel',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'Hotel Sai Sahawas, Shirdi',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Adlabs Entertainment Ltd.',
                    'client_logo' => '3.jpg'
                ],
                3 => [
                    'client_name' => 'ABIL',
                    'client_logo' => '4.jpg',
                ],
                4 => [
                    'client_name' => 'Panoramic Group',
                    'client_logo' => '5.jpg'
                ],
                5 => [
                    'client_name' => 'MAK Hotels & Resorts',
                    'client_logo' => '6.jpg'
                ],
                6 => [
                    'client_name' => 'TAJ Group of Hotels',
                    'client_logo' => '7.jpg'
                ],
                7 => [
                    'client_name' => 'Indo Pacific Hotels Ltd.',
                ],
                8 => [
                    'client_name' => 'Makewaves Sea Resort Pvt. Ltd.',
                ],
                9 => [
                    'client_name' => 'Palm Grove Beach Hotels Pvt. Ltd.',
                ],
                10 => [
                    'client_name' => 'Premier Inn India Pvt. Ltd.',
                ],
                11 => [
                    'client_name' => 'Victor Hotels & Motels Ltd.',
                ],

            ],
            'Oil, Gas & Refinery' => [
                0 => [
                    'client_name' => 'Dowac Systems',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'Seamak',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'British Petroleum',
                    'client_logo' => '5.jpg'
                ],
                3 => [
                    'client_name' => 'Total Oil India Ltd.',
                    'client_logo' => '4.jpg'
                ],
                4 => [
                    'client_name' => 'Schlumberger Asia Services Ltd.',
                    'client_logo' => '3.jpg'
                ],
                5 => [
                    'client_name' => 'Oil and Natural Gas Corporation Ltd.',
                    'client_logo' => '6.jpg'
                ],
                6 => [
                    'client_name' => 'Dow Chemical',
                    'client_logo' => '7.jpg'
                ],
                7 => [
                    'client_name' => 'Va Tech Wabag',
                    'client_logo' => '8.jpg'
                ],
                8 => [
                    'client_name' => 'Megha Engineering & Infrastructure Pvt Ltd',
                    'client_logo' => '9.jpg'
                ],
                9 => [
                    'client_name' => 'Cairn India',
                    'client_logo' => '10.jpg'
                ],
                10 => [
                    'client_name' => 'UEM India Pvt. Ltd.',
                    'client_logo' => '11.jpg'
                ],
            ],
            'Pharmaceuticals & Hospitals' => [
                0 => [
                    'client_name' => 'Cipla',
                    'client_logo' => '4.jpg'
                ],
                1 => [
                    'client_name' => 'D. K. Pharma Chem Pvt. Ltd.',
                    'client_logo' => '3.jpg'
                ],
                2 => [
                    'client_name' => 'NUSI Hospital',
                    'client_logo' => '1.jpg'
                ],
                3 => [
                    'client_name' => 'Wockhardt',
                    'client_logo' => '2.jpg'
                ],
                4 => [
                    'client_name' => 'Electropharma',
                ],
            ],
            'Power & Energy' => [
                0 => [
                    'client_name' => 'BGR Energy',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'Siemens Energy',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Evoqua Water Technologies',
                    'client_logo' => '3.jpg'
                ],
            ],
            'Renewables & Environment' => [
                0 => [
                    'client_name' => 'Good Life Products',
                ],
                1 => [
                    'client_name' => 'KWAN Enviornmental Solutions India Pvt. Ltd.',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Aquachem Enviro Engg Pvt. Ltd',
                    'client_logo' => '1.jpg'
                ],
                3 => [
                    'client_name' => '​UEM India Pvt. Ltd.',
                    'client_logo' => '4.jpg'
                ],
                4 => [
                    'client_name' => 'WOG Group',
                    'client_logo' => '3.jpg'
                ],
                5 => [
                    'client_name' => 'Evoqua Water Technologies',
                    'client_logo' => '5.jpg'
                ],
                6 => [
                    'client_name' => 'Hycor Utilities LLC',
                    'client_logo' => '6.jpg'
                ],
            ],
            'Residential & Housing' => [
                0 => [
                    'client_name' => 'Keystone Realtors Pvt. Ltd.',
                    'client_logo' => '1.jpg',
                ],
                1 => [
                    'client_name' => 'Juhu Real Estate Developers Pvt. Ltd.',
                ],
                2 => [
                    'client_name' => 'Sai Balaji Developers',
                ],
                3 => [
                    'client_name' => 'Worthwhile Properties Pvt. Ltd.',
                ],
                4 => [
                    'client_name' => 'Raiaskaran-Ecstasy Reality Pvt. Ltd.',
                    'client_logo' => '2.jpg',
                ],
                5 => [
                    'client_name' => 'Hiranandani',
                    'client_logo' => '3.jpg',
                ],
            ],
            'Textile' => [
                0 => [
                    'client_name' => 'Esstee Exports',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'Lavino Kapur',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Sudar Garments Ltd.',
                    'client_logo' => '3.jpg'
                ],
                3 => [
                    'client_name' => 'Welspun ',
                    'client_logo' => '4.jpg'
                ],
            ],
            'Others' => [
                0 => [
                    'client_name' => 'Voltas Limited.',
                    'client_logo' => '1.jpg'
                ],
                1 => [
                    'client_name' => 'Venus Wire Ind. Pvt. Ltd.',
                    'client_logo' => '2.jpg'
                ],
                2 => [
                    'client_name' => 'Uttam Galva',
                    'client_logo' => '3.jpg'
                ],
                3 => [
                    'client_name' => 'Datamatics Financial Services Limited',
                    'client_logo' => '4.jpg'
                ],
                4 => [
                    'client_name' => 'Reliance Retail Limited',
                    'client_logo' => '5.jpg'
                ],
                5 => [
                    'client_name' => 'Rashtriya Chemicals & Fertilizers Ltd., Mumbai',
                    'client_logo' => '6.jpg'
                ],
                6 => [
                    'client_name' => 'Prime ABGB Pvt. Ltd.',
                    'client_logo' => '7.jpg'
                ],
                7 => [
                    'client_name' => 'OEC',
                    'client_logo' => '8.jpg'
                ],
                8 => [
                    'client_name' => 'K Raheja Foundation',
                    'client_logo' => '9.jpg'
                ],
                9=> [
                    'client_name' => 'Gammon India Ltd',
                    'client_logo' => '10.jpg'
                ],
                10 => [
                    'client_name' => 'Endura Soft Solution Pvt. Ltd.',
                    'client_logo' => '11.jpg'
                ],
                11 => [
                    'client_name' => 'Effwa Infra & Research Pvt. Ltd.',
                    'client_logo' => '12.jpg'
                ],
                12 => [
                    'client_name' => 'Amphenol Interconnect India Pvt. Ltd',
                    'client_logo' => '13.jpg'
                ],
                13 => [
                    'client_name' => 'Alfa Laval',
                    'client_logo' => '14.jpg'
                ],
                14 => [
                    'client_name' => 'PSL Limited',
                    'client_logo' => '15.jpg'
                ],
                15 => [
                    'client_name' => 'Hitech Air Power Pvt Ltd',
                    'client_logo' => '16.jpg'
                ],
                16 => [
                    'client_name' => 'Godrej Industries',
                    'client_logo' => '17.jpg'
                ],
                17 => [
                    'client_name' => 'BDK India',
                    'client_logo' => '18.jpg'
                ],
                
                18 => [
                    'client_name' => 'Pilotfish',
                ],
                19 => [
                    'client_name' => 'Prasol Chemicals Ltd.',
                ],
                20 => [
                    'client_name' => 'Ronuk Metafin Pvt.Ltd',
                ],
                21 => [
                    'client_name' => 'Rosa Micro SRL',
                ],
                22 => [
                    'client_name' => 'SSML',
                ],
                23 => [
                    'client_name' => 'Techaid Group',
                ],
                25 => [
                    'client_name' => 'Seamak',
                    'client_logo' => '20.jpg'
                ],
                26 => [
                    'client_name' => 'Dowac Systems',
                    'client_logo' => '21.jpg'
                ],
            ],
        ];

        return view('web_pages.clients_and_consultants')->with([
            'clients_and_consultants' => $clients_and_consultants

        ]);
    }

    public function caseStudies($slug = null)
    {
        $case_studies = $this->allCaseStudies();

        if($slug == null)
        {
            return view('web_pages.case_studies_listing')->with([
                'case_studies' => $case_studies,
                'slug' => $slug,
            ]); 
        }
        else
        {
            if(isset($case_studies[$slug])){
                return view('web_pages.case_study')->with([
                    'case_studies' => $case_studies,
                    'case_studies' => $case_studies[$slug],
                    'slug' => $slug,
                ]);
            }
            else{
                /*return view('errors.404');*/
                abort('404');
            }
        }
    }

    public function allCaseStudies()
    {
        return [
            'malt-processing-wastewater' => [
                'seo_titleTag' => 'Malt Processing Case Studies | Sparkle Clean Tech Pvt.Ltd.',
                'seo_metaDesc' => 'Sparkle Clean Tech Pvt Ltd. have designed, supplied, commissioned 400 KLD Effluent Treatment using membrane Bio Reactor and reverse osmosis process for malt processing industry.',
                'seo_keywords' => 'Ultrafiltration Manufacturers, Ultrafiltration Manufacturers in India, industrial sea water reverse osmosis, industrial sea water reverse osmosis in Mumbai, Dialysis RO plants, industrial sea water reverse osmosis in India, Membrane Bio Reactor India',
                'card_image' => 'malt_processing.jpg',
                'banner_image' => 'malt_processing_banner.jpg',
                'title' => 'Malt Processing Industry',
                'url' => route('case-studies','malt-processing-wastewater'),
                'introduction' => 'Sparkle Clean Tech Pvt Ltd. have designed, supplied, commissioned 400 KLD Effluent Treatment using membrane Bio Reactor and reverse osmosis process for malt processing industry.',
                'challenge' => '<ul class="challenge__list">
                                    <li>To produce ultrafine reusable treated water from primary treated effluent generated during production at malt industry.</li>
                                    <li>To design system with modern technology for higher accuracy and minimal manual intervention.</li>
                                    <li>To provide assured quality and quantity of treated water.</li>
                                </ul>',
                'solution' => '<p>Considering clients requirement of high degree of treated water quality considering reuse of treated water for secondary production applications the Submerged Membrane Bio Reactor process technology was selected. The advantage of submerged MBR process is that it not only produces high quality treated effluent but also protects post treatment unit of reverse osmosis membranes from impurities such as TSS, and organic matter.</p>
                                
                                <p>The submerged membranes used were manufactured in USA and successfully installed and commissioned by Sparkle. Final stage treatment was carried out using RO for elimination of TDS from <a href=" http://www.sparklecleantech.com/waste-water-management-solution" style="color:#42a5f6;font-weight:600;">wastewater</a>. The treatment steps summarized are as below:</p>
                                <ul class="result__list">
                                    <li>Primary Treatment-Screening, Equalization, Chemical Dosing, Primary Clarification</li>
                                    <li>Biological Treatment with UASB ( Upflow Anaerobic Sludge Blanket), followed by Aerobic Bio Reactor based on MBR process</li>
                                    <li>Filtration using submerged membranes</li>
                                    <li>Reverse Osmosis process</li>
                                </ul>',

                'result' => '<p>The product water after MBR</p>
                            <ul class="result__list">
                                <li>Free from organic pollutants</li>
                                <li>Free from suspended soilds</li>
                                <li>Turbidity < 0.1 NTU</li>
                                <li>98% reduction in BOD</li>
                            </ul>

                            <p>The product water after Reverse Osmosis</p>
                            <ul class="result__list">
                                <li>Free from colour</li>
                                <li>Recovery 80 %</li>
                                <li>TDS less than 150 mg/l</li>
                            </ul>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>Restricts pollution and saves environment.</li>
                                <li>High purity treated water being used for various applications</li>
                                <li>Reduction in freshwater intake leading to cost savings</li>
                                <li>Fully automatic system with minimum manual intervention</li>
                                <li>Maximum recovery with minimal discharge</li>
                                <li>Small footprint saved area is used for other utilities</li>
                                <li>Low/ minimum sludge production</li>
                                <li>No foul smell/ odour</li>
                            </ul>'
            ],
            'textile-processing-industry' => [
                'seo_titleTag' => 'Textile Processing Industry Case Studies | Sparkle Clean Tech.',
                'seo_metaDesc' => 'Sparkle Clean Tech have supplied tailor‐made effluent treatment to leading textile products manufacturing & garment manufacturing company.',
                'seo_keywords' => 'Ultrafiltration Manufacturers, Ultrafiltration Manufacturers in india, Industrial Waste Water Treatment Plant, industrial wastewater treatment plants in india, Membrane Bio Reactor India, Waste water recycling system',
                'card_image' => 'textile_processing_industry.jpg',
                'banner_image' => 'textile_processing_banner.jpg',
                'title' => 'Textile Processing Industry',
                'url' => route('case-studies','textile-processing-industry'),
                'introduction' => 'We have supplied our special tailor‐made effluent treatment unit to
                                    leading textile products manufacturing, garment manufacturing
                                    company, primarily involved in manufacturing and exporting knitted
                                    garments.',
                'challenge' => 'The primary source of effluent was through the washing unit where in
                                various type of washes are provided to textile products for its
                                conditioning and in finishing stages. The effluent generated involves,
                                high temperature, parting colour, fibers, and also biological waste
                                coming out of enzyme washes. The city where this unit is located in
                                south India is known for textile manufacturing business and is facing
                                various problems due to generation of effluents from <a href="http://www.sparklecleantech.com/case-studies" style="color:#42a5f6;font-weight:600;">industrial</a> zone.
                                The local government had applied strict rules to control the liquid
                                pollution and as part of it is mandatory to treat the effluent in‐house to
                                all manufacturing units and reuse the treated water for process.',
                'solution' => '<p>Being a special kind of effluent the effluent treatment unit was provided
                                considering each specific effluent parameter.
                                The product offered is considering the clients specific requirements like,
                                Compactness, fast delivery, effective and modern technology, product
                                quality is to meet reuse norms for textile unit and assured consistent
                                quality.</p>
                                
                                <p>Sparkle offered its Product UF membrane based systems  with addition
                                of <a href="http://www.sparklecleantech.com/water-management-solution" style="color:#42a5f6;font-weight:600;">primary treatment</a> which had been very effective to meet clients all
                                requirements.</p>

                                <p>As a primary step the effluent was cooled in the underground tank
                                before treatment to bring down the temperature.</p>

                                <p>The Product offered was consisting of primary screening filters of
                                modern disk type filters to trap the incoming fibres coming out of
                                knitted garments. The next unit is providing physic‐ chemical treatment
                                to settle the inorganic impurities.</p>

                                <p>The biological treatment with attached growth media reactor was
                                provided to biologically treat the effluent and to reduce Bio Chemical
                                Oxygen Demand and Chemical Oxygen Demand from the effluent.
                                The biologically treated effluent is passed through Sparkle <a href="http://www.sparklecleantech.com/products/ultra-filtration" style="color:#42a5f6;font-weight:600;">Ultra
                                Filtration</a> system which is producing the treated effluent which is being
                                reused again in the process for textile washing unit.</p>',
                'result' => '<ul class="result__list">
                                <li>The quality of effluent not only meets the pollution boards norms but
                                    the it is almost free of all pollution parameters ( Bio Chemical Oxygen
                                    Demand less than 5 mg/l) and Total Suspended Solid nil. The treated
                                    water is colourless and odourless</li>
                                <li>The compact unit with auto operation does not requires manual intervention</li>
                                <li>The compact unit with auto operation does not require manual intervention and providing the trouble free solution to our client</li>
                            </ul>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>The compact unit which occupied a very small space on terrace of the textile unit</li>
                                <li>Auto operation and does not requires specially trained skilled operators to operate the unit</li>
                                <li>Consistent quality of treated effluent which is being reused</li>
                            </ul>'
            ],
            'sewage-treatment-plant' => [
                'seo_titleTag' => 'Sewage Treatment Plant Case Studies | Sparkle Clean Tech Pvt.Ltd',
                'seo_metaDesc' => 'Sparkle Clean Tech have supplied tailor‐made effluent treatment to leading textile products manufacturing & garment manufacturing company.',
                'seo_keywords' => 'Sewage Treatment Plant Manufacturers, sewage treatment plant manufacturers in mumbai, Ultrafiltration Manufacturers, Membrane Bio Reactor India, Membrane Bio Reactor',
                'card_image' => 'sewage_treatment_plant.jpg',
                'banner_image' => 'sewage_treatment_banner.jpg',
                'title' => 'Sewage Treatment Plant',
                'url' => route('case-studies','sewage-treatment-plant'),
                'introduction' => 'Residential complex, commercial & institutional buildings and
                                    infrastructure development projects needs to install the sewage treatment
                                    units for treatment of sewage generating in a complex. Sparkle’s
                                    proprietary UF membrane technology based package treatment units are
                                    functioning at various locations to produce reusable treated sewage which
                                    is being reused for various purpose. It helps to reduce the fresh water
                                    requirement.',
                'challenge' => 'The requirement of the modern buildings regarding the sewage treatment
                                units is requires with smallest possible footprint, suitable to fit in locations
                                such as basement, parking slot which generally has height restrictions,
                                requires no odour or noise problems. The sewage treatment plant is
                                desired to provide highest degree of treatment to sewage so that it can be
                                reused at various applications such as gardening, flushing, car washing etc.',
                'solution' => '<p>Sparkle offer customized package sewage treatment plants. The
                                prefabricated Sewage Treatment Plant units provide solution to small and
                                medium capacity flow requirements.
                                The prefabricated Sewage Treatment Plant is available in configurations
                                such as Mild steel tank, Mild steel tanks with anticorrosive Fibreglass
                                Reinforced Plastic lining or tanks made up of composite material Fibreglass
                                Reinforced Plastic.</p>
                                
                                <p>Our package units are based on state of are treatment processes such as
                                Aerobic Attached growth fixed film reactor (Submerged Aerated Fix Filmed
                                process), Moving Bed Bio Reactor which uses floating type media.
                                To achieve highest degree of treatment and where the required treated
                                water quality is absolutely critical we provide solutions with our MBR
                                ultrapac treatment which is based on ultra‐filtration membrane <a href="http://www.sparklecleantech.com/depth-filtration-technology" style="color:#42a5f6;font-weight:600;">filtration
                                process</a>.</p>

                                <p>The treatment stages in our package systems are generally primary
                                treatment, Anoxic process for removal of nitrogen, Biological process with
                                fixed film or floating media, aeration with modern silent jet aerators
                                followed by tertiary filtration.
                                Sparkle also provides option of containerised package sewage treatment
                                plants.</p>',
                'result' => '<ul class="result__list">
                                <li>The package SEWAGE TREATMENT PLANT units manufactured by sparkle are delivering optimum results at various places in India</li>
                                <li>The treated water is suitable to meet the norms at which it can be directly reused</li>
                                <li>The compact unit with auto operation does not require manual intervention and providing the trouble free solution to our client</li>
                            </ul>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>Small footprint</li>
                                <li>Easy installation no site work required</li>
                                <li>Low sludge production, highest degree treatment</li>
                                <li>Auto operation and does not requires specially trained skilled operators to operate the unit</li>
                                <li>Low maintenance and easy operation</li>
                                <li>Low noise, no odour, no nuisance</li>
                                <li>Value addition service to customers</li>
                                <li>Consistent quality of treated effluent which is being reused</li>
                                <li>Short delivery time</li>
                            </ul>'
            ],
            'oil-filling-station' => [
                'seo_titleTag' => 'Oil Filling Station Case Studies | Sparkle Clean Tech Pvt.Ltd.',
                'seo_metaDesc' => 'Sparkle provided the oil removal unit for oil water separation to oil lubricant manufacturing industry.',
                'seo_keywords' => 'Oil Separation from waste water, Oily waste water Treatment Plant, Effluent Treatment Plant (ETP), Effluent Treatment Plant',
                'card_image' => 'oil_filling_station.jpg',
                'banner_image' => 'oil_filling_banner.jpg',
                'title' => 'Oil Filling Station',
                'url' => route('case-studies','oil-filling-station'),
                'introduction' => 'Sparkle provided the oil removal unit to oil lubricant manufacturing <a href="http://www.sparklecleantech.com/industrial-sector" style="color:#42a5f6;font-weight:600;">industry</a>.',
                'challenge' => 'The proposed system is for <a href="http://www.sparklecleantech.com/oil-seperation-technology" style="color:#42a5f6;font-weight:600;">oil water separation</a> purpose. The oil spillage
                                at oil filling/ transfer station/ tanker unloading section of the <a href="http://www.sparklecleantech.com/industrial-sector" style="color:#42a5f6;font-weight:600;">industry</a>
                                was being transferred to ETP by the effluent collection network.
                                The high content of free oil was affecting the biological process at ETP;
                                hence it was essential to separate this free oil at source of its generation
                                before it gets mixed with other industrial effluents.',
                'solution' => '<p>Our <a href="http://www.sparklecleantech.com/oil-seperation-technology" style="color:#42a5f6;font-weight:600;">oil water separation</a> unit consists of plate pack constructed
                                of closely spaced corrugated plates which are inclined at a 55° angle or
                                more.</p>
                                
                                <p>The waste water flows through these plated either parallel to
                                the corrugations in "counter‐current flow" or at right angles to the
                                corrugations in "cross flow"</p>

                                <p>Under laminar flow conditions, the short distance between the
                                inclined plates is now the only distance over which the pollutants have
                                to rise or sink before they are intercepted and separated from the
                                mother fluid.</p>

                                <p>The separated layer of free oil is being skimmed off by
                                mechanical skimmers mounted on top of unit. The removed oil is
                                separately collected out in drums and being safely disposed off. The
                                separated water is free from oil and the oil content is below 2 ppm is
                                now sent to ETP for further treatment.</p>',
                'result' => '<p class="result__list">The installation of this unit is provided removal of oil at source and
                                hence the ETP process is improved</p>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>Effective removal of the free oil</li>
                                <li>Oil recovery</li>
                                <li>Improved quality in ETP treatment</li>
                            </ul>'
            ],
            'automobile-industry' => [
                'seo_titleTag' => 'Automobile Industry Case Studies | Sparkle Clean Tech Pvt.Ltd.',
                'seo_metaDesc' => 'A multinational group into automotive manufacturing with a total value of US $14.4 billion and presence in more than 100 countries across the globe.',
                'seo_keywords' => 'Zero Liquid Discharge system India, Ultrafiltration Manufacturers, Effluent Treatment Plant (ETP), Effluent Treatment Plant, industrial sea water reverse osmosis, Dialysis RO plants',
                'card_image' => 'automobile_industry.jpg',
                'banner_image' => 'automobile_banner.jpg',
                'title' => 'Automobile Industry',
                'url' => route('case-studies','automobile-industry'),
                'introduction' => 'A multinational group into automotive manufacturing with a total value
                                    of US $14.4 billion and presence in more than 100 countries across the
                                    globe.',
                'challenge' => 'The authorities at the manufacturing facility were unable to handle the
                                reject streams originating in their different processes. Government
                                approvals based on the adherence to discharge standards seemed an
                                uphill task.',
                'solution' => '<p>Site specific customised Zero Liquid Discharge plant catering to the client
                                requirement was conceived and an entire team was chalked out to cater
                                to the different stages of the treatment process. The entire treatment
                                scheme consisted of Effluent Treatment Plant – Clariflocculators –
                                Settling Tanks – Flash Mixers – <a href="http://www.sparklecleantech.com/products/ultra-filtration" style="color:#42a5f6;font-weight:600;">Ultra Filtration</a> & Reverse Osmosis
                                (Sparkle scope) – Multi Effect Evaporator.</p>
                                
                                <p>All the waste streams coming out of different parts of the plant were
                                routed to a common Effluent Treatment Plant. The outlet from the
                                Effluent Treatment Plant was further processed in Clariflocculators and
                                flash mixers and a considerable reduction was observed in the BOD,
                                COD and TSS levels. </p>

                                <p>Further, to cater to the more difficult task of reducing the fine
                                suspensions and TDS in the water, an exhaustive membrane based UF –
                                RO system was laid out with a recovery of almost 92%. Finally, the reject
                                from the RO system (approx 8%) was fed to the MEE for achieving
                                almost 100% recovery. </p>',
                'result' => '<p>The treated water is</p>
                            <ul class="result__list">
                                <li>Flow – 450 cum per day</li>
                                <li>Colourless and Odourless</li>
                                <li>Turbidity < 0.1 Nephlometric Turbidity Units</li>
                                <li>Total Suspended Solids < 0.1 ppm</li>
                                <li>Total Dissolved Solids < 50 ppm</li>
                            </ul>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>Treated water well within the safe disposal limits as
                                    prescribed the pollution control boards</li>
                                <li>High purity treated water being recycled and reused in
                                    different process systems</li>
                                <li>Reduction in freshwater intake leading to cost savings</li>
                                <li>Fully automatic UF – RO system with zero manual intervention</li>
                                <li>Superior membrane quality leading to lower operating cost of the UF system</li>
                                <li>Fully automatic UF system with zero manual intervention </li>
                                <li>Pollution Control Board and Government clearances</li>
                                <li>Small footprint</li>
                            </ul>'
            ],
            'oil-and-gas-industry' => [
                'seo_titleTag' => 'Oil And Gas Industry Case Studies | Sparkle Clean Tech Pvt.Ltd.',
                'seo_metaDesc' => 'Asia’s leading oil and gas exploration and production company faced with a tough problem of disposal of oily water mixture left after oil extraction.',
                'seo_keywords' => 'Oily waste water Treatment Plant, Oil Separation from waste water, walnut shell filters for oil removal, Waste Water Treatment Plant for Oil & Gas',
                'card_image' => 'oil_and_gas_industry.jpg',
                'banner_image' => 'oil_and_gas_banner.jpg',
                'title' => 'Oil & Gas Industry',
                'url' => route('case-studies','oil-and-gas-industry'),
                'introduction' => 'Asia’s leading <a href="http://www.sparklecleantech.com/oil-and-gas-sector" style="color:#42a5f6;font-weight:600;">oil and gas</a> exploration and production company.',
                'challenge' => 'The client was faced with a tough problem of disposal of oily water
                                mixture left after oil extraction. Disposal on to surface was leading to
                                infertility and associated soil related problems',
                'solution' => '<p>Various pilot studies with different kinds of membranes and treatment
                                scheme were carried out before freezing the final process scheme. Poly
                                Acrylo Nitrile based <a href="http://www.sparklecleantech.com/products/ultra-filtration" style="color:#42a5f6;font-weight:600;">Ultra Filtration</a> membranes based on excellent field
                                results were zeroed upon for actual site handling.</p>
                                
                                <p>The oily water mixture coming out of the heater treater was to be given
                                a residence time of 72 hrs. This water was then to be processed in a
                                Tilted Plate Interceptor followed – Induced Gas Floatation followed by
                                Walnut Shell Filter and finally in an <a href="http://www.sparklecleantech.com/products/ultra-filtration" style="color:#42a5f6;font-weight:600;">Ultra Filtration</a> system (Sparkle
                                Scope).</p>

                                <p>The outlet from the ETP is processed in 4 stage process as given above
                                with each stage catering to step reduction of the impurity load. The TPI
                                was to be used to minimise the coarse suspensions as well as the bigger
                                oil particles.  This considerably clean water was to be next processed in
                                an Induced Gas Floatation system where fine bubble mechanism is
                                employed to lift the small oil particles to the surface due to the density
                                difference. A dedicated mechanical system skims off this oil and this
                                water is further led to the Walnut Shell Filter for removal of the coarse
                                suspensions and oil particles. Finally, for final polishing an <a href="http://www.sparklecleantech.com/products/ultra-filtration" style="color:#42a5f6;font-weight:600;">Ultra Filtration</a> system is required to bring down the free oil levels to less than
                                10 ppm having particle size ≤ 2 microns.</p>',
                'result' => '<p>The treated water is</p>
                            <ul class="result__list">
                                <li>Flow – 0.6 MLD, 2 MLD, 5 MLD</li>
                                <li>Free Oil  < 10 parts per million</li>
                                <li>Turbidity < 3 Nephlometric Turbidity Units</li>
                                <li>Total Suspended Solids < 10 parts per million</li>
                            </ul>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>Treated water well within the safe limits as prescribed in the
                                reinjection water standards</li>
                                <li>Reduction in volumes and associated fresh water costs</li>
                                <li>Maintenance of underground pressures for better yield</li>
                                <li>Higher flux because of better membrane selection and thus lower capital costs</li>
                                <li>Superior membrane quality leading to lower operating cost of the UF system</li>
                                <li>Fully automatic UF system with zero manual intervention </li>
                                <li>Pollution Control Board and Government clearances</li>
                                <li>Consistent water quality with high degree of purity</li>
                                <li>Small footprint</li>
                            </ul>'
            ],
            'soap-and-detergent-industry' => [
                'seo_titleTag' => 'Soap & Detergent Industry Case Studies | Sparkle Clean Tech.',
                'seo_metaDesc' => 'One of India’s leading group in the FMCG sector with strong presence and hold in the soaps and detergent industry was faced with a tough problem of disposal of oily water mixture left after oil extraction.',
                'seo_keywords' => 'Pressure Sand Filterations water Treatment, Ultrafiltration Manufacturers, Oily waste water Treatment Plant, Oil Separation from waste water, Waste Water Treatment Plant for Oil & Gas, industrial sea water reverse osmosis',
                'card_image' => 'soap_and_detergent.jpg',
                'banner_image' => 'soap_and_detergent_banner.jpg',
                'title' => 'Soap & Detergent Industry',
                'url' => route('case-studies','soap-and-detergent-industry'),
                'introduction' => 'One of India’s leading group in the FMCG sector with strong presence
                                    and hold in the soaps and detergent industry.',
                'challenge' => 'The client was faced with a tough problem of disposal of oily water
                                mixture left after <a href="http://www.sparklecleantech.com/oil-seperation-technology" style="color:#42a5f6;font-weight:600;">oil</a> extraction. Disposal on to surface was leading to
                                infertility and associated soil related problems. ',
                'solution' => '<p>An in depth study of the incoming water prompts Sparkle to suggest a
                                membrane based clarification system, which not only brings down the
                                water to safe disposal limits but also makes it good enough to be used in
                                the boilers. Modification in the operating parameters suggested for
                                achieving better quality at the outlet. This ETP outlet water is further
                                sent for post treatment as given below.</p>
                                
                                <p>An extensive system for water treatment is suggested with the following
                                flow scheme, Bag Filter – Activated Carbon Filter – Pressure Sand Filter –
                                <a href="http://www.sparklecleantech.com/products/ultra-filtration" style="color:#42a5f6;font-weight:600;">Ultra Filtration</a> – Reverse Osmosis. A gradual reduction in the suspended
                                impurity load is effected in each successive stage. The Ultra Filtration
                                system brings down the turbidity and fine suspension levels drastically
                                so as to make the water quality appropriate for feeding to Reverse
                                Osmosis. The Reverse Osmosis system effectively brings down the Total
                                Dissolved Solid levels in the final permeate less than 80 parts per million
                                which is good enough for boiler water intake. </p>',
                'result' => '<p>The treated water is</p>
                            <ul class="result__list">
                                <li>Flow – 5 cum per hr</li>
                                <li>Turbidity < 1 Nephlometric Turbidity Units</li>
                                <li>Total Suspended Solids < 1 ppm</li>
                                <li>Total Dissolved Solids < 80 ppm</li>
                            </ul>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>Treated water well within the safe limits as prescribed in the surface water discharge standards</li>
                                <li>Higher flux because of better membrane selection and thus lower capital costs</li>
                                <li>Superior pre treatment and better membrane quality leading to lower operating cost of the UF –RO system</li>
                                <li>Fully automatic UF system with zero manual intervention</li>
                                <li>Pollution Control Board and Government clearances</li>
                                <li>High quality water being reused in boilers thereby reducing the fresh water intake volumes and the associated costs</li>
                                <li>Consistent water quality with high degree of purity</li>
                                <li>Small footprint</li>
                            </ul>'
            ],
            'power-plant-industry' => [
                'seo_titleTag' => 'Power Plant Industry Case Studies | Sparkle Clean Tech Pvt.Ltd.',
                'seo_metaDesc' => 'A leading energy company with a strong global presence. Inability to meet the effluent disposal standards as per pollution control board guidelines. ',
                'seo_keywords' => 'Water Treatment Plant india, Waste Water Treatment Plant, Waste Water Treatment Plant Manufacturers, industrial sea water reverse osmosis, Waste water recycling system',
                'card_image' => 'power_plant.jpg',
                'banner_image' => 'power_plant_banner.jpg',
                'title' => 'Power Plant Industry',
                'url' => route('case-studies','power-plant-industry'),
                'introduction' => 'A leading energy company with a strong global presence.',
                'challenge' => 'Inability to meet the effluent disposal standards as per pollution control
                                board guidelines. ',
                'solution' => '<p>A treatment scheme comprising of two staged Reverse Osmosis system
                                and a Demineralisation Plant were proposed keeping in mind the quality
                                and source of the incoming <a href="http://www.sparklecleantech.com/drinking-water-solution" style="color:#42a5f6;font-weight:600;">water</a> streams.</p>
                                
                                <p>After passing through the micron cartridge filter the <a href="http://www.sparklecleantech.com/drinking-water-solution" style="color:#42a5f6;font-weight:600;">water</a> passes
                                through the 2 staged Reverse Osmosis system for maximum recovery
                                (90% approx). The product <a href="http://www.sparklecleantech.com/drinking-water-solution" style="color:#42a5f6;font-weight:600;">water</a> is then made to pass through the
                                demineralisation plant in the form of a mixed bed where the trace scale
                                forming constituents are removed. </p>',
                'result' => '<p>The treated <a href="http://www.sparklecleantech.com/drinking-water-solution" style="color:#42a5f6;font-weight:600;">water</a> is</p>
                            <ul class="result__list">
                                <li>Flow – 25 cum per hr</li>
                                <li>Colourless and Odourless</li>
                                <li>Turbidity < 0.1 Nephlometric Turbidity Units</li>
                                <li>Total Suspended Solids < 0.1 ppm</li>
                                <li>Total Dissolved Solids < 50 ppm</li>
                            </ul>',
                'benefits_to_client' => '<ul class="benefits__list">
                                <li>High purity treated <a href="http://www.sparklecleantech.com/drinking-water-solution" style="color:#42a5f6;font-weight:600;">water</a> being used to fire critical boilers</li>
                                <li>Reduction in freshwater intake leading to cost savings</li>
                                <li>Fully automatic system with zero manual intervention</li>
                                <li>Maximum recovery with minimal discharge</li>
                                <li>Reduction in scale related production losses</li>
                                <li>Reduction in costs related to chemicals used for scale inhibition and scale chipping</li>
                                <li>Small footprint</li>
                            </ul>'
            ],
        ];
    }

    public function sectors()
    {
        $sector_name = Route::currentRouteName();
        $solution_link = '';
        $project_link = '';

        if($sector_name == 'commercial-sector'){
            $seo_titleTag = 'Commercial Sectors | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Sparkle Clean tech have been engaged in manufacturing and installing a wide range of Water Treatment Plants for commercial uses.';
            $sector_title = 'Commercial';
            $sector_desc_block = [
                0 => 'Sparkle has established itself as one of the most recognized and prominent firms in the world of
                    water treatment business. We have been engaged in manufacturing and installing a wide range
                    of Water Treatment Plants for commercial uses. Our Water Treatment Plants are systematically
                    engineered, using the finest quality parts, best raw material (sourced from authentic vendors of
                    the market) and the most advanced technology conforming to the standard norms and
                    specifications set by the water industry.',
                1 => 'Our Water Treatment Plants have been installed at various spots and locations by many commercial agencies requiring our services for water purification treatments. We have successfully treated a large number of water bodies and resources by removing physical, chemical and biological impurities from water and providing “clean water” to them. No wonder, our water-treatment plants have been well acclaimed by our clients as “reliable,” “easy to operate,” “long lasting,” “hassle-free” and “ having low maintenance costs.”',
            ];
            $sector_desc_list_title = 'Our Commercial section have provided the BEST WATERS to the following sectors:';
            $sector_desc_list = [
                0 => 'Community Parks',
                1 => 'Multiplexes',
                3 => 'Recreation Centers &amp; Clubs',
                4 => 'Swimming Pools',
                5 => 'Townships',
                6 => 'Health &amp; Education',
                7 => 'Hospitality',
                8 => 'Construction',
                9 => 'Urban Development',
            ];
            $solutions = [
                0 => [
                    'solution_heading' => '1. Water Management',
                    'solution_image' => 'water_management.jpg',
                    'solution_desc' => [
                        0 => 'Water covers 70% of our planet, and it is easy to think that it will always be plentiful.',
                        1 => 'Only 3% of the world’s water is freshwater, and two-thirds of that is tucked away in frozen glaciers or otherwise unavailable for our use.'
                    ],
                    'solution_link' => route('water-management-solution'),
                ],
                1 => [
                    'solution_heading' => '2. Drinking Water Management',
                    'solution_image' => 'drinking_water.jpg',
                    'solution_desc' => [
                        0 => 'Historically it is belief in India, Water is elixir of life.',
                        1 => 'Around 1.1 billion people worldwide lack access to water, and a total of 2.7 billion find water scarce for at least one month of the year. Inadequate sanitation is also a problem for 2.4 billion people—they are exposed to diseases, such as cholera and typhoid fever, and other water-borne illnesses. Two million people, mostly children, die each year from diarrheal diseases alone.'
                    ],
                    'solution_link' => route('drinking-water-solution'),
                ],
                2 => [
                    'solution_heading' => '3. Waste Water Management',
                    'solution_image' => 'waste_water.jpg',
                    'solution_desc' => [
                        0 => 'More than one in every six people in the world is water stressed, meaning that they do not have access to potable water. Those that are water stressed make up 1.1 billion people in the world and are living in developing countries.',
                        1 => 'Water as a resource is very fast depleting. Also pollution is one of the major concerns in the world. the above two makes waste water treatment extremely essential.'
                    ],
                    'solution_link' => route('waste-water-management-solution'),
                ],
                3 => [
                    'solution_heading' => '4. Zero Liquid Discharge',
                    'solution_image' => 'zld.jpg',
                    'solution_desc' => [
                        0 => 'Limited resources and serious issue of water pollution ZLD is gaining a lot of importance.',
                        1 => 'With regards to Zero Liquid Discharge (ZLD) by industries, government has already directed industries to achieve ZLD in distillery, tannery and textile units as it was mandatory that pollutants like chromium, total dissolved solid and other chemicals are separated before they are disposed of.  Industries are not allowed to put up their plants unless they have installed ZLD system.'
                    ],
                    'solution_link' => route('zero-liquid-discharge-solution'),
                ],
                4 => [
                    'solution_heading' => '5. Water Management For Oil & Gas',
                    'solution_image' => 'oil_and_gas.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle has been instrumental in tackling the challenge of converting oil-rich effluent to the state of making water reinjectable.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultrafiltration. This is widely used for the effluent of oil fields.'
                    ],
                    'solution_link' => route('oil-and-gas-solution'),
                ],
                5 => [
                    'solution_heading' => '6. Others',
                    'solution_image' => 'others.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle offers various other solutions which are used in varied industrial usage. The plants are manufactured with the assistance of advanced technology, under the stringent supervision of our team of experts for our esteemed clients.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultra filtration. This is widely used for the effluent of oil fields'
                    ],
                    'solution_link' => route('other-solution'),
                ],
            ];
        }
        elseif($sector_name == 'industrial-sector'){
            $seo_titleTag = 'Industrial Sectors | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Sparkle’s Industrial water treatment plants have been successfully installed in various industries.We have special provisions for offering such services.';
            $sector_title = 'Industrial';
            $sector_desc_block = [
                0 => 'Sparkle’s Industrial water / waste water treatment plants have been successfully installed in various industries. In most cases, the used water needs treatment to render it fit for reuse or disposal. We have special provisions for offering such services.',
                1 => 'Raw water entering an industrial plant often needs treatment in order to meet the stringent quality specifications to carry out various industrial processes. Our company reaches out to supply pure water for the boiler feeds as well as providing high purity water required in manufacturing ampoules for pharmaceutical purposes.',
                2 => 'Our Industrial water treatment section encompasses all the aspects like industrial water purification, wastewater treatment and Zero Liquid Discharge.'
            ];
            $sector_desc_list_title = 'We have catered to the WATER NEEDS of the following industrial sectors:';
            $sector_desc_list = [
                0 => 'Oil &amp; Energy',
                1 => 'Paper Mill',
                3 => 'Automobile',
                4 => 'Chemicals',
                5 => 'Foods &amp; Beverages',
                6 => 'Pharmaceutical',
                7 => 'Power',
                8 => 'Shipping',
                9 => 'Textile',
            ];
            $solutions = [
                0 => [
                    'solution_heading' => '1. Water Management',
                    'solution_image' => 'water_management.jpg',
                    'solution_desc' => [
                        0 => 'Water covers 70% of our planet, and it is easy to think that it will always be plentiful.',
                        1 => 'Only 3% of the world’s water is freshwater, and two-thirds of that is tucked away in frozen glaciers or otherwise unavailable for our use.'
                    ],
                    'solution_link' => route('water-management-solution'),
                ],
                1 => [
                    'solution_heading' => '2. Drinking Water Management',
                    'solution_image' => 'drinking_water.jpg',
                    'solution_desc' => [
                        0 => 'Historically it is belief in India, Water is elixir of life.',
                        1 => 'Around 1.1 billion people worldwide lack access to water, and a total of 2.7 billion find water scarce for at least one month of the year. Inadequate sanitation is also a problem for 2.4 billion people—they are exposed to diseases, such as cholera and typhoid fever, and other water-borne illnesses. Two million people, mostly children, die each year from diarrheal diseases alone.'
                    ],
                    'solution_link' => route('drinking-water-solution'),
                ],
                2 => [
                    'solution_heading' => '3. Waste Water Management',
                    'solution_image' => 'waste_water.jpg',
                    'solution_desc' => [
                        0 => 'More than one in every six people in the world is water stressed, meaning that they do not have access to potable water. Those that are water stressed make up 1.1 billion people in the world and are living in developing countries.',
                        1 => 'Water as a resource is very fast depleting. Also pollution is one of the major concerns in the world. the above two makes waste water treatment extremely essential.'
                    ],
                    'solution_link' => route('waste-water-management-solution'),
                ],
                3 => [
                    'solution_heading' => '4. Zero Liquid Discharge',
                    'solution_image' => 'zld.jpg',
                    'solution_desc' => [
                        0 => 'Limited resources and serious issue of water pollution ZLD is gaining a lot of importance.',
                        1 => 'With regards to Zero Liquid Discharge (ZLD) by industries, government has already directed industries to achieve ZLD in distillery, tannery and textile units as it was mandatory that pollutants like chromium, total dissolved solid and other chemicals are separated before they are disposed of.  Industries are not allowed to put up their plants unless they have installed ZLD system.'
                    ],
                    'solution_link' => route('zero-liquid-discharge-solution'),
                ],
                4 => [
                    'solution_heading' => '5. Water Management For Oil & Gas',
                    'solution_image' => 'oil_and_gas.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle has been instrumental in tackling the challenge of converting oil-rich effluent to the state of making water reinjectable.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultrafiltration. This is widely used for the effluent of oil fields.'
                    ],
                    'solution_link' => route('oil-and-gas-solution'),
                ],
                5 => [
                    'solution_heading' => '6. Others',
                    'solution_image' => 'others.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle offers various other solutions which are used in varied industrial usage. The plants are manufactured with the assistance of advanced technology, under the stringent supervision of our team of experts for our esteemed clients.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultra filtration. This is widely used for the effluent of oil fields'
                    ],
                    'solution_link' => route('other-solution'),
                ],
            ];
        }
        elseif($sector_name == 'government-sector'){
            $seo_titleTag = 'Government Sectors | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Sparkle with its most experienced, expert team of personnel, designs, manufactures and installs high quality Water Treatment Plants.';
            $sector_title = 'Government';
            $sector_desc_block = [
                0 => 'Sparkle with its most experienced, expert team of personnel, designs, manufactures and
                    installs high quality Water Treatment Plants, keeping in mind the needs of government
                    sectors. An in depth knowledge, sound technical know-how and a rich industrial experience
                    of our team members have been our greatest asset and it is to their credit that we have always
                    been ready to provide complete solutions for Drinking Water Treatment plants, Fluoride
                    removal, RO plants and others. These kind of plants, being high on demand in many
                    government projects, have been successfully installed by our engineers who are known for
                    keeping their promises of “on-time completion of projects,” “customized solutions” and
                    “promptness in the delivery and execution of systems.”',
                1 => 'The use of latest techniques, in accordance with maintaining the international standards, have
                    certainly been our outstanding features. In addition to that, one of our remarkable features is
                    our interactive rapport with our clients. Our professionals interact with our clients on regular
                    basis, know their needs and then, provide solutions to their water-treatment requirements.',
                2 => '<strong>Sea Water Treatment Plants</strong>',
                3 => 'We are one of the leading manufacturers and suppliers of a quality range of Sea Water
                    Treatment Plants. Keeping in mind the market norms, we make these plants using the finest
                    of components and innovative ideas. It is no wonder that these unique features of our Sea
                    Water treatment Plants have brought us loud applauses and laurels of success from our clients
                    in the market. Quality inspectors have vouched for the purity of our treated waters after having
                    tested them on the basis of specific quality facts and quality terms.'
            ];
            $sector_desc_list_title = 'Our Sea Water Treatment Plants have nurtured the following sectors:';
            $sector_desc_list = [
                0 => 'Educational Institutions',
                1 => 'Municipalities',
                3 => 'Towns',
                4 => 'Villages',
                5 => 'Military',
                6 => 'Civil Aviation',
                7 => 'Railways',
                8 => 'Road Ways',
                9 => 'Oil &amp; Energy',
                10 => 'Shipping',
            ];
            $solutions = [
                0 => [
                    'solution_heading' => '1. Water Management',
                    'solution_image' => 'water_management.jpg',
                    'solution_desc' => [
                        0 => 'Water covers 70% of our planet, and it is easy to think that it will always be plentiful.',
                        1 => 'Only 3% of the world’s water is freshwater, and two-thirds of that is tucked away in frozen glaciers or otherwise unavailable for our use.'
                    ],
                    'solution_link' => route('water-management-solution'),
                ],
                1 => [
                    'solution_heading' => '2. Drinking Water Management',
                    'solution_image' => 'drinking_water.jpg',
                    'solution_desc' => [
                        0 => 'Historically it is belief in India, Water is elixir of life.',
                        1 => 'Around 1.1 billion people worldwide lack access to water, and a total of 2.7 billion find water scarce for at least one month of the year. Inadequate sanitation is also a problem for 2.4 billion people—they are exposed to diseases, such as cholera and typhoid fever, and other water-borne illnesses. Two million people, mostly children, die each year from diarrheal diseases alone.'
                    ],
                    'solution_link' => route('drinking-water-solution'),
                ],
                2 => [
                    'solution_heading' => '3. Waste Water Management',
                    'solution_image' => 'waste_water.jpg',
                    'solution_desc' => [
                        0 => 'More than one in every six people in the world is water stressed, meaning that they do not have access to potable water. Those that are water stressed make up 1.1 billion people in the world and are living in developing countries.',
                        1 => 'Water as a resource is very fast depleting. Also pollution is one of the major concerns in the world. the above two makes waste water treatment extremely essential.'
                    ],
                    'solution_link' => route('waste-water-management-solution'),
                ],
                3 => [
                    'solution_heading' => '4. Zero Liquid Discharge',
                    'solution_image' => 'zld.jpg',
                    'solution_desc' => [
                        0 => 'Limited resources and serious issue of water pollution ZLD is gaining a lot of importance.',
                        1 => 'With regards to Zero Liquid Discharge (ZLD) by industries, government has already directed industries to achieve ZLD in distillery, tannery and textile units as it was mandatory that pollutants like chromium, total dissolved solid and other chemicals are separated before they are disposed of.  Industries are not allowed to put up their plants unless they have installed ZLD system.'
                    ],
                    'solution_link' => route('zero-liquid-discharge-solution'),
                ],
                4 => [
                    'solution_heading' => '5. Water Management For Oil & Gas',
                    'solution_image' => 'oil_and_gas.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle has been instrumental in tackling the challenge of converting oil-rich effluent to the state of making water reinjectable.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultrafiltration. This is widely used for the effluent of oil fields.'
                    ],
                    'solution_link' => route('oil-and-gas-solution'),
                ],
                5 => [
                    'solution_heading' => '6. Others',
                    'solution_image' => 'others.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle offers various other solutions which are used in varied industrial usage. The plants are manufactured with the assistance of advanced technology, under the stringent supervision of our team of experts for our esteemed clients.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultra filtration. This is widely used for the effluent of oil fields'
                    ],
                    'solution_link' => route('other-solution'),
                ],
            ];
            $project_link = route('government-project');
        }
        elseif($sector_name == 'oil-and-gas-sector'){
            $seo_titleTag = 'Oil & Gas Sectors | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Sparkle recognizes the Water produced during oil & gas extraction operations constitutes the industry’s most toughest waste stream based on volume.';
            $sector_title = 'Oil & Gas';
            $sector_desc_block = [
                0 => 'In recent decades, the oil and gas industry has undergone significant changes. Water produced during oil and gas extraction operations constitutes the industry’s most toughest waste stream based on volume.',
                1 => 'Sparkle recognizes the importance of oil & gas industry and has been serving some of the largest global oil and gas companies in meeting their water treatment and waste water treatment requirement.',
                2 => 'With the wide range of technologies, our approach is to provide solution for produced water, effluent or water for the reinjection from oil and gas exploration and production.',
                3 => 'Produced water handling practices must always be in sync with both community and regulatory requirements.',
            ];
            $sector_desc_list_title = '';
            $sector_desc_list = [
                0 => 'Oil & Energy',
            ];
            $solutions = [
                0 => [
                    'solution_heading' => '1. Water Management',
                    'solution_image' => 'water_management.jpg',
                    'solution_desc' => [
                        0 => 'Water covers 70% of our planet, and it is easy to think that it will always be plentiful.',
                        1 => 'Only 3% of the world’s water is freshwater, and two-thirds of that is tucked away in frozen glaciers or otherwise unavailable for our use.'
                    ],
                    'solution_link' => route('water-management-solution'),
                ],
                1 => [
                    'solution_heading' => '2. Drinking Water Management',
                    'solution_image' => 'drinking_water.jpg',
                    'solution_desc' => [
                        0 => 'Historically it is belief in India, Water is elixir of life.',
                        1 => 'Around 1.1 billion people worldwide lack access to water, and a total of 2.7 billion find water scarce for at least one month of the year. Inadequate sanitation is also a problem for 2.4 billion people—they are exposed to diseases, such as cholera and typhoid fever, and other water-borne illnesses. Two million people, mostly children, die each year from diarrheal diseases alone.'
                    ],
                    'solution_link' => route('drinking-water-solution'),
                ],
                2 => [
                    'solution_heading' => '3. Waste Water Management',
                    'solution_image' => 'waste_water.jpg',
                    'solution_desc' => [
                        0 => 'More than one in every six people in the world is water stressed, meaning that they do not have access to potable water. Those that are water stressed make up 1.1 billion people in the world and are living in developing countries.',
                        1 => 'Water as a resource is very fast depleting. Also pollution is one of the major concerns in the world. the above two makes waste water treatment extremely essential.'
                    ],
                    'solution_link' => route('waste-water-management-solution'),
                ],
                3 => [
                    'solution_heading' => '4. Zero Liquid Discharge',
                    'solution_image' => 'zld.jpg',
                    'solution_desc' => [
                        0 => 'Limited resources and serious issue of water pollution ZLD is gaining a lot of importance.',
                        1 => 'With regards to Zero Liquid Discharge (ZLD) by industries, government has already directed industries to achieve ZLD in distillery, tannery and textile units as it was mandatory that pollutants like chromium, total dissolved solid and other chemicals are separated before they are disposed of.  Industries are not allowed to put up their plants unless they have installed ZLD system.'
                    ],
                    'solution_link' => route('zero-liquid-discharge-solution'),
                ],
                4 => [
                    'solution_heading' => '5. Water Management For Oil & Gas',
                    'solution_image' => 'oil_and_gas.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle has been instrumental in tackling the challenge of converting oil-rich effluent to the state of making water reinjectable.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultrafiltration. This is widely used for the effluent of oil fields.'
                    ],
                    'solution_link' => route('oil-and-gas-solution'),
                ],
                5 => [
                    'solution_heading' => '6. Others',
                    'solution_image' => 'others.jpg',
                    'solution_desc' => [
                        0 => 'Sparkle offers various other solutions which are used in varied industrial usage. The plants are manufactured with the assistance of advanced technology, under the stringent supervision of our team of experts for our esteemed clients.',
                        1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultra filtration. This is widely used for the effluent of oil fields'
                    ],
                    'solution_link' => route('other-solution'),
                ],
            ];
            
        }
        else {
            abort(404);
            exit;
        }

        return view('web_pages.sectors', [
            'sector_title' => $sector_title,
            'sector_desc_block' => $sector_desc_block,  
            'sector_desc_list' => $sector_desc_list,
            'solutions' => $solutions,
            'project_link' => $project_link,
            'sector_desc_list_title' => $sector_desc_list_title,
            'seo_titleTag' => $seo_titleTag,
            'seo_metaDesc' => $seo_metaDesc
        ]);
    }

    public function solutions()
    {
        $solution_name = Route::currentRouteName();
        $project_link = '';

        if($solution_name == 'water-management-solution'){
            $seo_titleTag = 'Water Management Solution| Sparkle Clean Tech Pvt.Ltd.';
            $seo_keywords = 'Water Treatment Plant india, Domestic water treatment, Ion Exchange, Pressure Sand Filtrations water Treatment, Multigrade filter water treatment, Ultrafiltration Manufacturers, Dialysis RO plants';
            $seo_metaDesc = 'Sparkle, provide complete water-purification solutions for treating raw / fresh water bodies and sources, so to make it easily available for Industries.';
            $solution_title = 'Water Management';
            $solution_desc_block = [
                0 => 'Water covers 70% of our planet, and it is easy to think that it will always be plentiful.',
                1 => 'Only 3% of the world’s water is freshwater, and two-thirds of that is tucked away in frozen glaciers or otherwise unavailable for our use.',
                2 => 'In such a critical scenario, it is very important to treat each drop of water, using the most effective technology that ensures an easy supply of safe drinking water.',
                3 => 'We, at Sparkle, provide complete and comprehensive water-purification solutions for treating raw / fresh water bodies and sources, so as to make it easily available for Industrial, Domestic and other essential utilities.',
                4 => 'For the removal of physical impurities such as suspended particles and turbidity, stand alone filtration or combination of flocculation, clarification, depth filtration and membrane filtration is applied.',
                5 => 'For contaminations caused by malevolent bacteria, viruses and other biological impurities. Sparkle provides effective solutions by providing disinfection methods using chlorination, activated carbon and membrane type separation.',
                6 => 'For inorganic dissolved impurities, Sparkle provides solutions like Resin Based Softening and Ion Exchange.',
                7 => 'Sparkle also provides Membrane Based Nanofiltration and Reverse Osmosis techniques.',
            ];
            $technologies = [
                0 => [
                    'technology_heading' => 'Depth Filtration',
                    'technology_image' => 'depth_filtration.jpg',
                    'technology_desc' => [
                        0 => 'Depth filters are the variety of filters that use a porous filtration medium to retain particles throughout the medium, rather than just on the surface of it.',
                        1 => 'These filters are commonly used when the water to be filtered contains a load of particles because, in comparison to the other types of filters, they can retain a large mass of particles before becoming clogged.'
                    ],
                    'technology_link' => route('depth-filtration-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Pressure Sand Filter',
                            'product_link' => route('products','pressure-sand-filter'),
                        ],
                        1 => [
                            'product_name' => 'Iron Removal Filter',
                            'product_link' => route('products','iron-removal-filter'),
                        ],
                        2 => [
                            'product_name' => 'Activated Carbon Filter',
                            'product_link' => route('products','activated-carbon-filter'),
                        ],
                        3 => [
                            'product_name' => 'Multigrade Filtration',
                            'product_link' => route('products','multigrade-filtration'),
                        ],
                    ],
                ],
                1 => [
                    'technology_heading' => 'Micro / Membrane Filtration',
                    'technology_image' => 'ultra_filtration.jpg',
                    'technology_desc' => [
                        0 => 'Micron filtration is to segregate or separate particulate matter based on the size of the particulate matter. Sewing, screening or surface filtration are also the types of surface filtration based on size of the particulate matter.',
                        1 => 'When the requirement of filtration is less than 0.2 microns, then membrane filtration is also used. In water and waste water treatment, this type of filters are very critical. It acts as a guard filter to further membrane treatment. Micron / membrane filtration also restricts the presence of the organics, bacteria and virus.'
                    ],
                    'technology_link' => route('micro-membrane-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Micron Cartridge Filter',
                            'product_link' => route('products','micron-cartridge-filter'),
                        ],
                        1 => [
                            'product_name' => 'Ultra Filration',
                            'product_link' => route('products','ultra-filtration'),
                        ],
                    ],
                ],
                2 => [
                    'technology_heading' => 'Ion Exchange',
                    'technology_image' => 'softner.jpg',
                    'technology_desc' => [
                        0 => 'Ion exchange is a resin based process, the inner bids of resin carry either positive or negative ion which can be exchanged with the ion of incoming water. The dissolved salt or solids comprising of positive or negative ions are passed through cation and anion resins to achieve desired results.',
                    ],
                    'technology_link' => route('ion-exchange-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Softner',
                            'product_link' => route('products','softner'),
                        ],
                        1 => [
                            'product_name' => 'D.M Plant - 2 bed',
                            'product_link' => route('products','dm-plant-2-bed'),
                        ],
                        2 => [
                            'product_name' => 'D. M. Plant - 3 bed',
                            'product_link' => route('products','dm-plant-3-bed'),
                        ],
                        3 => [
                            'product_name' => 'Standalone Mixed bed',
                            'product_link' => route('products','standalone-mixed-bed'),
                        ],
                    ],
                ],
                3 => [
                    'technology_heading' => 'RO',
                    'technology_image' => 'ro.jpg',
                    'technology_desc' => [
                        0 => 'Osmosis is defined as a water with low concentration, passes through a semi permeable membrane and forms a equilibrium with water of higher concentration available on the other side of the membrane. The pressure at which this phenomenon takes place is called Osmotic Pressure.',
                    ],
                    'technology_link' => route('ro-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'RO',
                            'product_link' => route('products','ro-plant'),
                        ],
                    ],
                ],
                4 => [
                    'technology_heading' => 'Others',
                    'technology_image' => 'nano_filtration.jpg',
                    'technology_desc' => [
                        0 => 'Various other technologies are used in water management treatment. For instance, Degasser tower breaks weak carbonic acid into carbon dioxide and water. Degassed tower is considered in a DM water system or in D Alkalizing system when the alkalinity in the water is very high and the pay back of Degasser tower is favorable.',
                        1 => 'Nano Filtration is a stage of filtration between UF and RO where semi-permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e., calcium and magnesium salts from water.',
                    ],
                    'technology_link' => route('other-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Degasser',
                            'product_link' => route('products','degasser'),
                        ],
                        1 => [
                            'product_name' => 'Nano Filtration',
                            'product_link' => route('products','nano-filtration'),
                        ],
                        2 => [
                            'product_name' => 'Ultra Violet System',
                            'product_link' => route('products','ultra-violet-system'),
                        ],
                        3 => [
                            'product_name' => 'Ozonator',
                            'product_link' => route('products','ozonator'),
                        ],
                        4 => [
                            'product_name' => 'EDI',
                            'product_link' => route('products','edi'),
                        ],
                    ],
                ],
            ];
            $project_link = route('water-management-project');
        }
        elseif($solution_name == 'waste-water-management-solution'){
            $seo_titleTag = 'Waste Water Management Solution | Sparkle Clean Tech Pvt.Ltd.';
            $seo_keywords = 'Waste Water Treatment Plant, Waste Water Treatment Plant Manufacturers, Membrane Bio Reactor India, Pressure Sand Filtrations water Treatment, Multigrade filter water treatment, Ultrafiltration Manufacturers, Ion Exchange';
            $seo_metaDesc = 'Sparkle waste water management solution offers value added services to its customers by supplying water of superior quality and large quantity.';
            $solution_title = 'Waste Water Management';
            $solution_desc_block = [
                0 => 'More than one among every six people in the world are “water-stressed”, i.e., they do not have access to potable water. Unfortunately, 1.1 billion people from the developing countries of the world fall into this category.',
                1 => 'Water, as a resource, is a fast depleting body. Pollution, being one of the major concerns in the world today, make it nonetheless, more important for the waste-water treatment to be inevitable and extremely essential for saving pure water.',
                2 => 'We, at Sparkle, provide potent solutions for purifying waste-water, domestic and diverse industrial purposes. While doing so, we ensure that maximum amount of water is treated to the level of being reused.',
                3 => 'Basically, waste-water can be classified into two types: Sewage and Effluent.',
                4 => 'For any Sewage, the major contaminants are biological-oxygen- demand, chemical-oxygen-demand and suspended impurities.',
                5 => 'For removing suspended impurities, Sparkle provides primary settling with the equipment such as clarifiers and tube/ plate settlers .',
                6 => 'Sparkle employs various technologies for treating chemical-oxygen- demand and biological-oxygen-demand, depending upon the requirement of the treated-water parameter conditions. For treating waste water, both the processes : the suspended growth process comprising of activated sludge process and extended aeration; and the attached growth process comprising of submerged aerated fixed film reactors and moving bed bioreactors are employed. The post- treatment process is generally, carried out with filtration and disinfection.',
                7 => 'Sparkle also provides the combination - membrane bioreactors.',
                8 => 'Sparkle waste water management solution offers value added services to its customers by supplying water of superior quality and large quantity.',
                9 => 'Using innovative techniques, Sparkle enhances process efficiency and offers industry specific solutions for customized requirements.',
                10 => 'The various processes involved in treating the effluent are industry-specific and therefore, customized accordingly.',
                11 => 'Sparkle undertakes a systematic study of the effluent in its effectively designed Laboratory and conducts pilot trials before suggesting the solution. The solution provided is the combination of specific, biological and physical treatment.',
                12 => 'At Sparkle, we believe in the LAST DROP CONCEPT, so we select the technology which wastes the least amount of water while purifying it.',
            ];
            $technologies = [
                0 => [
                    'technology_heading' => 'Membrane Bio Reactor ( MBR )',
                    'technology_image' => 'mbr.jpg',
                    'technology_desc' => [
                        0 => 'Membrane Bio Reactor (MBR) is a combination of two basic processes i.e. biological degradation and membrane separation. They are merged into a single process where suspended solids and microorganisms responsible for biodegradation are separated from the treated water by membrane filtration unit.',
                    ],
                    'technology_link' => route('membrane-bio-reactor-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Membrane Bio Reactor (MBR)',
                            'product_link' => route('products','membrane-bio-reactor'),
                        ],
                    ],
                ],
                1 => [
                    'technology_heading' => 'Depth Filtration',
                    'technology_image' => 'activated_carbon.jpg',
                    'technology_desc' => [
                        0 => 'Depth filters are the variety of filters that use a porous filtration medium to retain particles throughout the medium, rather than just on the surface of it.',
                        1 => 'These filters are commonly used when the water to be filtered contains a load of particles because, in comparison to the other types of filters, they can retain a large mass of particles before becoming clogged.'
                    ],
                    'technology_link' => route('depth-filtration-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Pressure Sand Filter',
                            'product_link' => route('products','pressure-sand-filter'),
                        ],
                        1 => [
                            'product_name' => 'Iron Removal Filter',
                            'product_link' => route('products','iron-removal-filter'),
                        ],
                        2 => [
                            'product_name' => 'Activated Carbon Filter',
                            'product_link' => route('products','activated-carbon-filter'),
                        ],
                        3 => [
                            'product_name' => 'Multigrade Filtration',
                            'product_link' => route('products','multigrade-filtration'),
                        ],
                    ],
                ],
                2 => [
                    'technology_heading' => 'Others',
                    'technology_image' => 'degasser.jpg',
                    'technology_desc' => [
                        0 => 'Various other technology used in water management treatment are Degasser which breaks weak carbonic acid into carbon dioxide and water. Degassed tower is considered in a DM water system or in D Alclysing system when the alcalynity in the water is very high and the pay back of degasser tower is favorable.',
                        1 => 'Nano Filtration  is a stage of filtration between UF and RO where semi permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e, calcium and magnesium salts from water.',
                    ],
                    'technology_link' => route('other-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Degasser',
                            'product_link' => route('products','degasser'),
                        ],
                        1 => [
                            'product_name' => 'Nano Filtration',
                            'product_link' => route('products','nano-filtration'),
                        ],
                        2 => [
                            'product_name' => 'Ultra Violet System',
                            'product_link' => route('products','ultra-violet-system'),
                        ],
                        3 => [
                            'product_name' => 'Ozonator',
                            'product_link' => route('products','ozonator'),
                        ],
                        4 => [
                            'product_name' => 'EDI',
                            'product_link' => route('products','edi'),
                        ],
                    ],
                ],
                3 => [
                    'technology_heading' => 'Micro / Membrane Filtration',
                    'technology_image' => 'ultra_filtration.jpg',
                    'technology_desc' => [
                        0 => 'Micron filtration is to segregate or separate particulate matter based on the size of the particulate matter. Sewing, screening or surface filtration are also the types of surface filtration based on size of the particulate matter.',
                        1 => 'When the requirement of filtration is less than 0.2 microns, then membrane filtration is also used. In water and waste water treatment, this type of filters are very critical. It acts as a guard filter to further membrane treatment. Micron / membrane filtration also restricts the presence of the organics, bacteria and virus.'
                    ],
                    'technology_link' => route('micro-membrane-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Micron Cartridge Filter',
                            'product_link' => route('products','micron-cartridge-filter'),
                        ],
                        1 => [
                            'product_name' => 'Ultra Filration',
                            'product_link' => route('products','ultra-filtration'),
                        ],
                    ],
                ],
                4 => [
                    'technology_heading' => 'Setting / Coagulation / Flocculation',
                    'technology_image' => 'hrscc.jpg',
                    'technology_desc' => [
                        0 => 'Coagulation is predominantly used in effluent water treatment processes for separation of free oil, solids removal, water clarification, lime softening, sludge thickening, and solids dewatering. The negative electrical charge on particles are neutralized, which destabilizes the forces keeping colloids apart.',
                        1 => 'Clari Floccution is a combination of clarifier and flocculation. There is a separate chamber provided for dossing flocculants in the unit. There are many types of Clari Flocculators like Central drive, peripheral drive, agitator gate type etc.',
                    ],
                    'technology_link' => route('setting-coagulation-flocculation-oil-seperation-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Corrugulated Plate Intersected ( CPI )',
                            'product_link' => route('products','corrugulated-plate-intersected'),
                        ],
                        1 => [
                            'product_name' => 'Inducted Gas Flotation ( IGF )',
                            'product_link' => route('products','inducted-gas-flotation'),
                        ],
                        2 => [
                            'product_name' => 'Nut Shell Filter ( NSF )',
                            'product_link' => route('products','nut-shell-filter'),
                        ],
                        3 => [
                            'product_name' => 'High Rate Solid Contact clarifier ( HRSCC )',
                            'product_link' => route('products','high-rate-solid-contact-clarifier'),
                        ],
                        4 => [
                            'product_name' => 'Dissolved Air Flotation ( DAF )',
                            'product_link' => route('products','dissolved-air-flotation'),
                        ],
                        5 => [
                            'product_name' => 'Clari - flocculation',
                            'product_link' => route('products','cleri-flocculation'),
                        ],
                        6 => [
                            'product_name' => 'Tube / Plate Separation',
                            'product_link' => route('products','tube-plate-separation'),
                        ],
                        7 => [
                            'product_name' => 'Oil Skimmer',
                            'product_link' => route('products','oil-skimmer'),
                        ],
                    ],
                ],
                5 => [
                    'technology_heading' => 'Activated Sludge Process',
                    'technology_image' => 'extended_aeration.jpg',
                    'technology_desc' => [
                        0 => 'The activated sludge process is a process for treating sewage and industrial wastewaters using air and a biological floc composed of bacteria and protozoa.',
                        1 => 'In a sewage (or industrial wastewater) treatment plant, the activated sludge process is a biological process that can be used for one or several of the following purposes: oxidizing carbonaceous biological matter, oxidizing nitrogenous matter: mainly ammonium and nitrogen in biological matter, removing nutrients (nitrogen and phosphorus).'
                    ],
                    'technology_link' => route('actuated-sludge-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Extended Aeration',
                            'product_link' => route('products','extended-aeration'),
                        ],
                        1 => [
                            'product_name' => 'Sequential Batch Reactor ( SBR )',
                            'product_link' => route('products','sequential-batch-reactor'),
                        ],
                    ],
                ],
                6 => [
                    'technology_heading' => 'Attached Growth Process',
                    'technology_image' => 'mbbr.jpg',
                    'technology_desc' => [
                        0 => 'Wastewater treatment processes in which the microorganisms and bacteria treating the wastes are attached to the media in the reactor. The wastes being treated flow over the media. Trickling filters and rotating biological contactors are attached growth reactors. These reactors can be used for BOD removal, nitrification, and denitrification.',
                    ],
                    'technology_link' => route('attached-growth-process-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Submerged Aerated Fixed Film Bio Reactor ( SAFF )',
                            'product_link' => route('products','submerged-aerated-fixed-film-bio-reactor'),
                        ],
                        1 => [
                            'product_name' => 'Moving Bed Bioreactor ( MBBR )',
                            'product_link' => route('products','moving-bed-bioreactor'),
                        ],
                    ],
                ],
                7 => [
                    'technology_heading' => 'Ion Exchange',
                    'technology_image' => 'dm_plant2.jpg',
                    'technology_desc' => [
                        0 => 'Ion exchange is a resin based process, the inner bids of resin carry either positive or negative ion which can be exchanged with the ion of incoming water. The dissolved salt or solids comprising of positive or negative ions are passed through cation and anion resins to achieve desired results.',
                    ],
                    'technology_link' => route('ion-exchange-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Softner',
                            'product_link' => route('products','softner'),
                        ],
                        1 => [
                            'product_name' => 'D.M Plant - 2 bed',
                            'product_link' => route('products','dm-plant-2-bed'),
                        ],
                        2 => [
                            'product_name' => 'D. M. Plant - 3 bed',
                            'product_link' => route('products','dm-plant-3-bed'),
                        ],
                        3 => [
                            'product_name' => 'Standalone Mixed bed',
                            'product_link' => route('products','standalone-mixed-bed'),
                        ],
                    ],
                ],
            ];
            $project_link = route('waste-water-management-project');
        }
        elseif($solution_name == 'drinking-water-solution'){
            $seo_titleTag = 'Drinking Water Solutions | Sparkle Clean Tech Pvt.Ltd.';
            $seo_keywords = 'Water Treatment Plant india, Domestic water treatment, Ion Exchange, Pressure Sand Filtrations water Treatment, Multigrade filter water treatment, Activated carbon filter, Nano Filtration Plant, Nano Filtration plant manufacturers';
            $seo_metaDesc = 'At Sparkle, we offer drinking water treatment providing state of the art solutions that ensures zero passage of contaminants from our system.';
            $solution_title = 'Drinking Water';
            $solution_desc_block = [
                0 => 'In India, water is considered to be the elixir of life and water conservation techniques were evidently an integral part of the architectural monuments in ancient India.',
                1 => 'Around 1.1 billion people worldwide lack access to water. A total of 2.7 billion undergo a situation of water-crisis for at least a month during an year. Inadequate sanitation is also a problem for 2.4 billion people—they are exposed to diseases, such as cholera, jaundice, typhoid, fever, and other water-borne illnesses. Two million people, mostly children, die every year, alone of diarrheal conditions.',
                2 => 'With such a limited quantity of drinking water available and to add to it, the grim, lurking danger of people contacting water-borne diseases, we, at Sparkle, lay special emphasis on treating water for potable purposes.',
                3 => 'Water potability has to deal with the removal of contamination agents, suspended impurities, biological impurities and dissolved impurities. For the removal of physical impurities such as suspended particles and turbidity, stand alone filtration or combination of flocculation, clarification, depth filtration and membrane filtration is applied.',
                4 => 'For contaminations caused by malevolent bacteria, viruses and other biological impurities. Sparkle provides effective solutions by providing disinfection methods using chlorination, activated carbon and membrane type separation',
                5 => 'Our customers are benefited from our innovative and proven solutions. Sparkle offers end to end services that include various activities such as designing, building, operating, maintaining , upgrading and managing the drinking water treatment facilities.',
                6 => 'At Sparkle, we offer drinking water treatment providing state of the art solutions that ensures zero passage of contaminants from our system.',
            ];
            $technologies = [
                0 => [
                    'technology_heading' => 'RO Plant',
                    'technology_image' => 'ro.jpg',
                    'technology_desc' => [
                        0 => 'Osmosis is defined as a water with low concentration, passes through a semi permeable membrane and forms a equilibrium with water of higher concentration available on the other side of the membrane. The pressure at which this phenomenon takes place is called Osmotic Pressure.',
                    ],
                    'technology_link' => route('ro-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'RO',
                            'product_link' => route('products','ro-plant'),
                        ],
                    ],
                ],
                1 => [
                    'technology_heading' => 'Micro / Membrane Filtration',
                    'technology_image' => 'ultra_filtration.jpg',
                    'technology_desc' => [
                        0 => 'Micron filtration is to segregate or separate particulate matter based on the size of the particulate matter. Sewing, screening or surface filtration are also the types of surface filtration based on size of the particulate matter.',
                        1 => 'When the requirement of filtration is less than 0.2 microns, then membrane filtration is also used. In water and waste water treatment, this type of filters are very critical. It acts as a guard filter to further membrane treatment. Micron / membrane filtration also restricts the presence of the organics, bacteria and virus.'
                    ],
                    'technology_link' => route('micro-membrane-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Micron Cartridge Filter',
                            'product_link' => route('products','micron-cartridge-filter'),
                        ],
                        1 => [
                            'product_name' => 'Ultra Filration',
                            'product_link' => route('products','ultra-filtration'),
                        ],
                    ],
                ],
                2 => [
                    'technology_heading' => 'Depth Filtration',
                    'technology_image' => 'pressure_sand.jpg',
                    'technology_desc' => [
                        0 => 'Depth filters are the variety of filters that use a porous filtration medium to retain particles throughout the medium, rather than just on the surface of it.',
                        1 => 'These filters are commonly used when the water to be filtered contains a load of particles because, in comparison to the other types of filters, they can retain a large mass of particles before becoming clogged.'
                    ],
                    'technology_link' => route('depth-filtration-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Pressure Sand Filter',
                            'product_link' => route('products','pressure-sand-filter'),
                        ],
                        1 => [
                            'product_name' => 'Iron Removal Filter',
                            'product_link' => route('products','iron-removal-filter'),
                        ],
                        2 => [
                            'product_name' => 'Activated Carbon Filter',
                            'product_link' => route('products','activated-carbon-filter'),
                        ],
                        3 => [
                            'product_name' => 'Multigrade Filtration',
                            'product_link' => route('products','multigrade-filtration'),
                        ],
                    ],
                ],
                3 => [
                    'technology_heading' => 'Others',
                    'technology_image' => 'edi.jpg',
                    'technology_desc' => [
                        0 => 'Various other technology used in water management treatment are Degasser which breaks weak carbonic acid into carbon dioxide and water. Degassed tower is considered in a DM water system or in D Alclysing system when the alcalynity in the water is very high and the pay back of degasser tower is favorable.',
                        1 => 'Nano Filtration  is a stage of filtration between UF and RO where semi permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e, calcium and magnesium salts from water.',
                    ],
                    'technology_link' => route('other-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Degasser',
                            'product_link' => route('products','degasser'),
                        ],
                        1 => [
                            'product_name' => 'Nano Filtration',
                            'product_link' => route('products','nano-filtration'),
                        ],
                        2 => [
                            'product_name' => 'Ultra Violet System',
                            'product_link' => route('products','ultra-violet-system'),
                        ],
                        3 => [
                            'product_name' => 'Ozonator',
                            'product_link' => route('products','ozonator'),
                        ],
                        4 => [
                            'product_name' => 'EDI',
                            'product_link' => route('products','edi'),
                        ],
                    ],
                ],
            ];
        }
        elseif($solution_name == 'zero-liquid-discharge-solution'){
            $seo_titleTag = 'Zero Liquid Discharge Solution | Sparkle Clean Tech Pvt.Ltd.';
            $seo_keywords = 'Zero Liquid Discharge system India, Ultrafiltration Manufacturers, reverse osmosis plant, Pressure Sand Filtrations water Treatment, Multigrade filter water treatment';
            $seo_metaDesc = 'At Sparkle, we have been an integral part of this movement, and have provided solution by treating the toughest of Liquid discharges.';
            $solution_title = 'Zero Liquid Discharge';
            $solution_desc_block = [
                0 => 'Limited resources and serious issue of water pollution ZLD is gaining a lot of importance.',
                1 => 'With regards to Zero Liquid Discharge (ZLD) by industries, government has already directed industries to achieve ZLD in distillery, tannery and textile units as it was mandatory that pollutants like chromium, total dissolved solid and other chemicals are separated before they are disposed of. Industries are not allowed to put up their plants, unless they have installed ZLD system.',
                2 => 'At Sparkle, we have been an integral part of this movement, and have provided solution by treating the toughest of discharges.',
                3 => 'For arriving at ZLD, various technologies have been employed for treating the effluent and the treated effluent by way of employing ultrafiltration and Reverse Osmosis technologies. At the final stage of ZLD solution is the challenge of evaporating the concentrated water. This is achieved with the help of multi-effect evaporators.',
                4 => 'Sparkle ZLD system equipment is designed in such a way that it ensures easy to operate, control and install mechanism.',
            ];
            $technologies = [
                0 => [
                    'technology_heading' => 'Micro / Membrane Filtration',
                    'technology_image' => 'ultra_filtration.jpg',
                    'technology_desc' => [
                        0 => 'Micron filtration is to segregate or separate particulate matter based on the size of the particulate matter. Sewing, screening or surface filtration are also the types of surface filtration based on size of the particulate matter.',
                        1 => 'When the requirement of filtration is less than 0.2 microns, then membrane filtration is also used. In water and waste water treatment, this type of filters are very critical. It acts as a guard filter to further membrane treatment. Micron / membrane filtration also restricts the presence of the organics, bacteria and virus.'
                    ],
                    'technology_link' => route('micro-membrane-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Micron Cartridge Filter',
                            'product_link' => route('products','micron-cartridge-filter'),
                        ],
                        1 => [
                            'product_name' => 'Ultra Filration',
                            'product_link' => route('products','ultra-filtration'),
                        ],
                    ],
                ],
                1 => [
                    'technology_heading' => 'Depth Filtration',
                    'technology_image' => 'pressure_sand.jpg',
                    'technology_desc' => [
                        0 => 'Depth filters are the variety of filters that use a porous filtration medium to retain particles throughout the medium, rather than just on the surface of it.',
                        1 => 'These filters are commonly used when the water to be filtered contains a load of particles because, in comparison to the other types of filters, they can retain a large mass of particles before becoming clogged.'
                    ],
                    'technology_link' => route('depth-filtration-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Pressure Sand Filter',
                            'product_link' => route('products','pressure-sand-filter'),
                        ],
                        1 => [
                            'product_name' => 'Iron Removal Filter',
                            'product_link' => route('products','iron-removal-filter'),
                        ],
                        2 => [
                            'product_name' => 'Activated Carbon Filter',
                            'product_link' => route('products','activated-carbon-filter'),
                        ],
                        3 => [
                            'product_name' => 'Multigrade Filtration',
                            'product_link' => route('products','multigrade-filtration'),
                        ],
                    ],
                ],
                2 => [
                    'technology_heading' => 'Others',
                    'technology_image' => 'edi.jpg',
                    'technology_desc' => [
                        0 => 'Various other technology used in water management treatment are Degasser which breaks weak carbonic acid into carbon dioxide and water. Degassed tower is considered in a DM water system or in D Alclysing system when the alcalynity in the water is very high and the pay back of degasser tower is favorable.',
                        1 => 'Nano Filtration  is a stage of filtration between UF and RO where semi permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e, calcium and magnesium salts from water.',
                    ],
                    'technology_link' => route('other-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Degasser',
                            'product_link' => route('products','degasser'),
                        ],
                        1 => [
                            'product_name' => 'Nano Filtration',
                            'product_link' => route('products','nano-filtration'),
                        ],
                        2 => [
                            'product_name' => 'Ultra Violet System',
                            'product_link' => route('products','ultra-violet-system'),
                        ],
                        3 => [
                            'product_name' => 'Ozonator',
                            'product_link' => route('products','ozonator'),
                        ],
                        4 => [
                            'product_name' => 'EDI',
                            'product_link' => route('products','edi'),
                        ],
                    ],
                ],
                3 => [
                    'technology_heading' => 'RO Plant',
                    'technology_image' => 'ro.jpg',
                    'technology_desc' => [
                        0 => 'Osmosis is defined as a water with low concentration, passes through a semi permeable membrane and forms a equilibrium with water of higher concentration available on the other side of the membrane. The pressure at which this phenomenon takes place is called Osmotic Pressure.',
                    ],
                    'technology_link' => route('ro-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'RO',
                            'product_link' => route('products','ro-plant'),
                        ],
                    ],
                ],
            ];
        }
        elseif($solution_name == 'oil-and-gas-solution'){
            $seo_titleTag = 'Oil & Gas Solution| Sparkle Clean Tech Pvt.Ltd.';
            $seo_keywords = 'walnut shell filters for oil removal, Oily waste water Treatment Plant, Oil Separation from waste water, Waste Water Treatment Plant for Oil & Gas, Ultrafiltration Manufacturers, Waste Water Treatment Plant, Nut Shell Filter water Treatment, Inducted Gas Flotation Manufacturers';
            $seo_metaDesc = 'Sparkle has been instrumental in tackling the challenge of converting oil-rich effluent to the state of making water reinjectable.';
            $solution_title = 'Water Management for Oil & Gas';
            $solution_desc_block = [
                0 => 'Sparkle has been instrumental in tackling the challenge of converting oil-rich effluent to the state of making water reinjectable.',
                1 => 'Specific applications like removal of oil from oil rich effluent is done by Sparkle by using technologies like induced gas flotation, dissolved air flotation, Walnut shell filters and special type of ultrafiltration. This is widely used for the effluent of oil fields.',
            ];
            $technologies = [
                0 => [
                    'technology_heading' => 'Oil Separation',
                    'technology_image' => 'activated_carbon.jpg',
                    'technology_desc' => [
                        0 => 'As a special treatment for oil removal from oil rich effluent additional equipment are employed.',
                        1 => 'The conventional treatment like coagulation / flocculation becomes the primary treatment for oil rich effluent.',
                        2 => 'TPI / CPI is followed by IGF / Dissolved Air Flotation are installed to treat emulsified oil. The above water is then treated in a Walnut shell filter which reduce the oil content effluent to around 10ppm.',
                        3 => 'Ultrafiltration is the final / polishing treatment is given to the above treated effluent. The elaborated treatment as above enables the water / effluent to be the standard of the injection.'
                    ],
                    'technology_link' => route('oil-seperation-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Nut Shell Filter',
                            'product_link' => route('products','nut-shell-filter'),
                        ],
                        1 => [
                            'product_name' => 'Oil Skimmer',
                            'product_link' => route('products','oil-skimmer'),
                        ],
                        2 => [
                            'product_name' => 'Corrugulated Plate Intersected ( CPI )',
                            'product_link' => route('products','corrugulated-plate-intersected'),
                        ],
                        3 => [
                            'product_name' => 'Inducted Gas Flotation ( IGF )',
                            'product_link' => route('products','inducted-gas-flotation'),
                        ],
                    ],
                ],
                1 => [
                    'technology_heading' => 'Setting / Coagulation / Flocculation',
                    'technology_image' => 'igf.jpg',
                    'technology_desc' => [
                        0 => 'Coagulation is predominantly used in effluent water treatment processes for separation of free oil, solids removal, water clarification, lime softening, sludge thickening, and solids dewatering. The negative electrical charge on particles are neutralized, which destabilizes the forces keeping colloids apart.',
                        1 => 'Clari Floccution is a combination of clarifier and flocculation. There is a separate chamber provided for dossing flocculants in the unit. There are many types of Clari Flocculators like Central drive, peripheral drive, agitator gate type etc.',
                    ],
                    'technology_link' => route('setting-coagulation-flocculation-oil-seperation-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'High Rate Solid Contact clarifier ( HRSCC )',
                            'product_link' => route('products','high-rate-solid-contact-clarifier'),
                        ],
                        1 => [
                            'product_name' => 'Dissolved Air Flotation ( DAF )',
                            'product_link' => route('products','dissolved-air-flotation'),
                        ],
                        2 => [
                            'product_name' => 'Clari - flocculation',
                            'product_link' => route('products','cleri-flocculation'),
                        ],
                        3 => [
                            'product_name' => 'Tube / Plate Separation',
                            'product_link' => route('products','tube-plate-separation'),
                        ],
                    ],
                ],
            ];
        }
        elseif($solution_name == 'other-solution'){
            $seo_titleTag = 'Others Solution | Sparkle Clean Tech Pvt.Ltd.';
            $seo_keywords = 'industrial sea water reverse osmosis, Dialysis RO plants, Sea water desalination, desalination plant manufacturers, Fluoride removal plants, Industrial Waste Water Treatment Plant';
            $seo_metaDesc = 'Sparkle offers various other solutions that are used in varied industrial usage.Abundant amount of seawater is available in the world.';
            $solution_title = 'Others';
            $solution_desc_block = [
                0 => 'Sparkle offers various other solutions that are used in varied industrial usage. The plants are manufactured with the assistance of advanced technology, under the stringent supervision of our team of experts specially hired for the full satisfaction of our esteemed clients.',
                1 => 'Abundant amount of seawater is available in the world. One of the easiest way of resolving the water issue is the Desalination of seawater. Sparkle provides state of the art desalination technology.',
                2 => 'Water for injections, high purity water for semiconductors, pharmaceutical or power boilers are also some of our major applications.',
                3 => 'As a very specialized application, Sparkle has installed a number of Dialysis RO plants to various hospitals and Dialysis Units',
                4 => 'Sparkle has the special technology to remove / treat groundwater contaminated with Fluoride, Iron, Arsenic, etc.',
                5 => 'Further to above applications, Sparkle has installed the highest number of polishing Ultra Filtration systems.',
                6 => 'Sparkle takes special care in the designing of the plant so that the it can operate under wide range of feed water quality in terms of physical, chemical and biological contaminants with minimal pretreatment.',
            ];
            $technologies = [
                0 => [
                    'technology_heading' => 'Depth Filtration',
                    'technology_image' => 'activated_carbon.jpg',
                    'technology_desc' => [
                        0 => 'Depth filters are the variety of filters that use a porous filtration medium to retain particles throughout the medium, rather than just on the surface of it.',
                        1 => 'These filters are commonly used when the water to be filtered contains a load of particles because, in comparison to the other types of filters, they can retain a large mass of particles before becoming clogged.'
                    ],
                    'technology_link' => route('depth-filtration-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Pressure Sand Filter',
                            'product_link' => route('products','pressure-sand-filter'),
                        ],
                        1 => [
                            'product_name' => 'Iron Removal Filter',
                            'product_link' => route('products','iron-removal-filter'),
                        ],
                        2 => [
                            'product_name' => 'Activated Carbon Filter',
                            'product_link' => route('products','activated-carbon-filter'),
                        ],
                        3 => [
                            'product_name' => 'Multigrade Filtration',
                            'product_link' => route('products','multigrade-filtration'),
                        ],
                    ],
                ],
                1 => [
                    'technology_heading' => 'Micro / Membrane Filtration',
                    'technology_image' => 'micron_cartridge.jpg',
                    'technology_desc' => [
                        0 => 'Micron filtration is to segregate or separate particulate matter based on the size of the particulate matter. Sewing, screening or surface filtration are also the types of surface filtration based on size of the particulate matter.',
                        1 => 'When the requirement of filtration is less than 0.2 microns, then membrane filtration is also used. In water and waste water treatment, this type of filters are very critical. It acts as a guard filter to further membrane treatment. Micron / membrane filtration also restricts the presence of the organics, bacteria and virus.'
                    ],
                    'technology_link' => route('micro-membrane-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Micron Cartridge Filter',
                            'product_link' => route('products','micron-cartridge-filter'),
                        ],
                        1 => [
                            'product_name' => 'Ultra Filration',
                            'product_link' => route('products','ultra-filtration'),
                        ],
                    ],
                ],
                2 => [
                    'technology_heading' => 'RO Plant',
                    'technology_image' => 'ro.jpg',
                    'technology_desc' => [
                        0 => 'Osmosis is defined as a water with low concentration, passes through a semi permeable membrane and forms a equilibrium with water of higher concentration available on the other side of the membrane. The pressure at which this phenomenon takes place is called Osmotic Pressure.',
                    ],
                    'technology_link' => route('ro-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'RO',
                            'product_link' => route('products','ro-plant'),
                        ],
                    ],
                ],
                3 => [
                    'technology_heading' => 'Setting / Coagulation / Flocculation',
                    'technology_image' => 'igf.jpg',
                    'technology_desc' => [
                        0 => 'Coagulation is predominantly used in effluent water treatment processes for separation of free oil, solids removal, water clarification, lime softening, sludge thickening, and solids dewatering. The negative electrical charge on particles are neutralized, which destabilizes the forces keeping colloids apart.',
                        1 => 'Clari Floccution is a combination of clarifier and flocculation. There is a separate chamber provided for dossing flocculants in the unit. There are many types of Clari Flocculators like Central drive, peripheral drive, agitator gate type etc.',
                    ],
                    'technology_link' => route('setting-coagulation-flocculation-oil-seperation-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Corrugulated Plate Intersected ( CPI )',
                            'product_link' => route('products','corrugulated-plate-intersected'),
                        ],
                        1 => [
                            'product_name' => 'Inducted Gas Flotation ( IGF )',
                            'product_link' => route('products','inducted-gas-flotation'),
                        ],
                        2 => [
                            'product_name' => 'Nut Shell Filter ( NSF )',
                            'product_link' => route('products','nut-shell-filter'),
                        ],
                        3 => [
                            'product_name' => 'High Rate Solid Contact clarifier ( HRSCC )',
                            'product_link' => route('products','high-rate-solid-contact-clarifier'),
                        ],
                        4 => [
                            'product_name' => 'Dissolved Air Flotation ( DAF )',
                            'product_link' => route('products','dissolved-air-flotation'),
                        ],
                        5 => [
                            'product_name' => 'Clari - flocculation',
                            'product_link' => route('products','cleri-flocculation'),
                        ],
                        6 => [
                            'product_name' => 'Tube / Plate Separation',
                            'product_link' => route('products','tube-plate-separation'),
                        ],
                        7 => [
                            'product_name' => 'Oil Skimmer',
                            'product_link' => route('products','oil-skimmer'),
                        ],
                    ],
                ],
                4 => [
                    'technology_heading' => 'Others',
                    'technology_image' => 'nano_filtration.jpg',
                    'technology_desc' => [
                        0 => 'Various other technology used in water management treatment are Degasser which breaks weak carbonic acid into carbon dioxide and water. Degassed tower is considered in a DM water system or in D Alclysing system when the alcalynity in the water is very high and the pay back of degasser tower is favorable.',
                        1 => 'Nano Filtration  is a stage of filtration between UF and RO where semi permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e, calcium and magnesium salts from water.',
                    ],
                    'technology_link' => route('other-technology'),
                    'products' => [
                        0 => [
                            'product_name' => 'Degasser',
                            'product_link' => route('products','degasser'),
                        ],
                        1 => [
                            'product_name' => 'Nano Filtration',
                            'product_link' => route('products','nano-filtration'),
                        ],
                        2 => [
                            'product_name' => 'Ultra Violet System',
                            'product_link' => route('products','ultra-violet-system'),
                        ],
                        3 => [
                            'product_name' => 'Ozonator',
                            'product_link' => route('products','ozonator'),
                        ],
                        4 => [
                            'product_name' => 'EDI',
                            'product_link' => route('products','edi'),
                        ],
                    ],
                ],
            ];
        }
        else {
            App::abort(404);
            exit;
        }

        return view('web_pages.solutions', [
            'solution_title' => $solution_title,
            'seo_keywords' => $seo_keywords,
            'solution_desc_block' => $solution_desc_block,
            'technologies' => $technologies,
            'project_link' => $project_link,
            'seo_titleTag' => $seo_titleTag,
            'seo_metaDesc' => $seo_metaDesc 
        ]);
    }

    public function projects()
    {
        $project_name = Route::currentRouteName();
        $project = [];
        $treatment = [];
        $table = [];

        if($project_name == 'water-management-project'){
            $seo_titleTag = 'Water Management Projects | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Sparkle has treated Domestic and Drinking Water, Sewage Recycle, Effluent from Textile Industry & Sewage Treatment Plant';
            $project_title = 'Water Management';

            $project = [
                'project_client_logo' => 'ongc.jpg',
                'project_client_name' => 'ONGC',
                'project_treatment_solution' => 'Reinjection of Produced Water',
                'project_sector' => 'Oil & Gas Industry',

                'content_title' => [
                    0 => 'capacity',
                    1 => 'Site',
                    2 => 'Process'
                ],
                
                'project_details' => [
                    0 => [
                        0 => '600 m3 / day',
                        1 => 'Site 1',
                        2 => 'UF',
                    ],
                    1 => [
                        0 => '2000 m3 / day',
                        1 => 'Site 2',
                        2 => 'UF',
                    ],
                    2 => [
                        0 => '2000 m3 / day',
                        1 => 'Site 3',
                        2 => 'UF',
                    ],
                    3 => [
                        0 => '2000 m3 / day',
                        1 => 'Site 4',
                        2 => 'UF',
                    ],
                    4 => [
                        0 => '5000 m3 / day',
                        1 => 'Site 5',
                        2 => 'UF',
                    ],
                    5 => [
                        0 => '5000 m3 / day',
                        1 => 'Site 6',
                        2 => 'UF',
                    ],
                ],
            ];

            $treatment = [
                'treatment_heading' => 'Water Treatment Plants',
                'treatment_title' => [
                    0 => 'Treatment',
                    1 => 'Capacity',
                    2 => 'Process',
                    3 => 'Site',
                ],
                'treatment_details' => [
                    0 => [
                        0 => 'Treatment for drinking water purpose',
                        1 => '72 m3/day',
                        2 => 'RO',
                        3 => 'EPC',
                    ],
                    1 => [
                        0 => 'Treatment for use as ultra high purity dialysis water',
                        1 => '48 m3/day',
                        2 => 'RO',
                        3 => 'Hospital',
                    ],
                    2 => [
                        0 => 'Treatment for use as ultra high purity dialysis water',
                        1 => '36 m3 / day',
                        2 => 'UF',
                        3 => 'Pharmaceutical',
                    ],
                    3 => [
                        0 => 'Primary Treatment of River Water for community supply',
                        1 => '1200 m3 / day',
                        2 => 'UF',
                        3 => 'Government',
                    ],
                    4 => [
                        0 => 'Treatment for use as ultra high purity dialysis water',
                        1 => '48 m3 / day',
                        2 => 'RO',
                        3 => 'Hospital',
                    ],
                    5 => [
                        0 => 'Effluent Treatment',
                        1 => '8.4 m3 / day',
                        2 => 'UF',
                        3 => 'Engineering',
                    ],
                    6 => [
                        0 => 'Treatment of Drinking Water purpose',
                        1 => '100 m3 / day',
                        2 => 'UF',
                        3 => 'Government',
                    ],
                    7 => [
                        0 => 'Treatment of Drinking Water purpose',
                        1 => '48 m3 / day',
                        2 => 'UF + RO',
                        3 => 'Government',
                    ],
                    8 => [
                        0 => 'Industrial use brackish water desalination for process',
                        1 => '36 m3 / day',
                        2 => 'RO',
                        3 => 'Textile',
                    ],
                    9 => [
                        0 => 'Dialysis',
                        1 => '12 m3 / day',
                        2 => 'RO',
                        3 => 'Hospital',
                    ],
                    10 => [
                        0 => 'Iron Removal',
                        1 => '12 m3 / day',
                        2 => 'UF',
                        3 => 'Government',
                    ],
                    11 => [
                        0 => 'Primary Treatment of River water for community supply',
                        1 => '1000 m3 / day',
                        2 => 'UF',
                        3 => 'Government',
                    ],
                    12 => [
                        0 => 'Zero Discharge Plant for Effluent recycle and reuse',
                        1 => '450 m3 / day',
                        2 => 'UF + RO',
                        3 => 'Automobile',
                    ],
                    13 => [
                        0 => 'ETP Recycle for Boiler Reuse',
                        1 => '120 m3 / day',
                        2 => 'UF + RO',
                        3 => 'Chemical',
                    ],
                    14 => [
                        0 => 'Treatment for drinking water purpose',
                        1 => '192 m3 / day | 250 m3/day',
                        2 => 'UF',
                        3 => 'EPC',
                    ],
                    15 => [
                        0 => 'Zero Liquid Discharge',
                        1 => '216 m3 / day',
                        2 => 'UF',
                        3 => 'Engineering',
                    ],
                    16 => [
                        0 => 'Domestic and Drinking Water System',
                        1 => '180 m3 / day',
                        2 => 'UF',
                        3 => 'Infrastructure',
                    ],
                    17 => [
                        0 => 'Drinking Water System',
                        1 => '10 m3 / day',
                        2 => 'UF',
                        3 => 'EPC',
                    ],
                    18 => [
                        0 => 'Iron Removal system water to be used for laundry',
                        1 => '320 m3 / day',
                        2 => 'UF',
                        3 => 'Hotel',
                    ],
                    19 => [
                        0 => 'Treatment for Effluent polishing',
                        1 => '400 m3 / day',
                        2 => 'UF',
                        3 => 'Environment',
                    ],
                    20 => [
                        0 => 'Softener for Domestic use',
                        1 => '160 m3 / day',
                        2 => 'WTP',
                        3 => 'Infrastructure',
                    ],
                    21 => [
                        0 => 'Brackish water for process',
                        1 => '8 m3 / day',
                        2 => 'RO',
                        3 => 'Textile',
                    ],
                    22 => [
                        0 => 'Drinking Water System',
                        1 => '20 m3 / day',
                        2 => 'UF',
                        3 => 'Infrastructure',
                    ],
                    23 => [
                        0 => 'Drinking Water System',
                        1 => '400 m3 / day',
                        2 => 'UF',
                        3 => 'Engineering',
                    ],
                    24 => [
                        0 => 'Effluent Recycle',
                        1 => '42 m3 / day',
                        2 => 'UF + RO',
                        3 => 'Environment',
                    ],
                    25 => [
                        0 => 'Treated Sewage Polishing',
                        1 => '120 m3 / day',
                        2 => 'UF',
                        3 => 'Environment',
                    ],
                    26 => [
                        0 => 'Domestic and Drinking Water System',
                        1 => '50 m3 / day',
                        2 => 'RO',
                        3 => 'Residential',
                    ],
                    27 => [
                        0 => 'Drinking Water System',
                        1 => '10 m3 / day',
                        2 => 'UF',
                        3 => 'Residential',
                    ],
                    28 => [
                        0 => 'Effluent Recycle',
                        1 => '208 m3 / day',
                        2 => 'UF',
                        3 => 'Textile',
                    ],
                    29 => [
                        0 => 'Domestic Water System',
                        1 => '140 m3 / day',
                        2 => 'Softner',
                        3 => 'Environment',
                    ],
                    30 => [
                        0 => 'Drinking Water System',
                        1 => '10 m3 / day',
                        2 => 'UF',
                        3 => 'Residential',
                    ],
                    31 => [
                        0 => 'Effluent Recycle',
                        1 => '208 m3 / day',
                        2 => 'UF',
                        3 => 'Textile',
                    ],
                    32 => [
                        0 => 'Domestic Water System',
                        1 => '140 m3 / day',
                        2 => 'Softner',
                        3 => 'Hotel',
                    ],
                    33 => [
                        0 => 'Drinking Water System',
                        1 => '5 m3 / day',
                        2 => 'RO',
                        3 => 'EPC',
                    ],
                    34 => [
                        0 => 'Iron Removal Plant',
                        1 => '10 m3 / day',
                        2 => 'Iron Removal System',
                        3 => 'EPC',
                    ],
                    35 => [
                        0 => 'Treated Sewage Polishing',
                        1 => '150 m3 / day',
                        2 => 'UF',
                        3 => 'Infrastructure',
                    ],
                    36 => [
                        0 => 'Brackish Water for Process',
                        1 => '40 m3 / day',
                        2 => 'RO',
                        3 => 'Engineering',
                    ],
                    37 => [
                        0 => 'Dialysis',
                        1 => '60 m3 / day',
                        2 => 'RO',
                        3 => 'Hospital',
                    ],
                    38 => [
                        0 => 'Effluent Recycle',
                        1 => '120 m3 / day',
                        2 => 'UF',
                        3 => 'Engineering',
                    ],
                    39 => [
                        0 => 'Drinking Water System',
                        1 => '20 m3 / day',
                        2 => 'UF',
                        3 => 'EPC',
                    ],
                    40 => [
                        0 => 'STP Recycle',
                        1 => '300 m3 / day',
                        2 => 'UF',
                        3 => 'Residential',
                    ],
                    41 => [
                        0 => 'Zero Liquid Discharge',
                        1 => '300 m3 / day',
                        2 => 'UF + RO',
                        3 => 'Automobile',
                    ],
                    42 => [
                        0 => 'Zero Liquid Discharge',
                        1 => '300 m3 / day',
                        2 => 'UF + RO',
                        3 => 'Automobile',
                    ],
                    43 => [
                        0 => 'High Purity Water for Boiler Feed',
                        1 => '400 m3 / day',
                        2 => 'RO + MB',
                        3 => 'EPS',
                    ],
                    44 => [
                        0 => 'Effluent Recycle',
                        1 => '540 m3 / day',
                        2 => 'RO',
                        3 => 'Engineering',
                    ],
                    45 => [
                        0 => 'Drinking Water System',
                        1 => '4 m3 / day',
                        2 => 'WTP',
                        3 => 'Chemical',
                    ],
                    46 => [
                        0 => 'Drinking Water System',
                        1 => '60 m3 / day',
                        2 => 'UF',
                        3 => 'Chemical',
                    ],
                    47 => [
                        0 => 'Water Treatment Plant',
                        1 => '60 m3 / day',
                        2 => 'Softner',
                        3 => 'Hotel',
                    ],
                    48 => [
                        0 => 'Water Treatment Plant',
                        1 => '1200 m3 / day',
                        2 => 'WTP',
                        3 => 'MEP Consultant',
                    ],
                    49 => [
                        0 => 'Sewage Recycle System',
                        1 => '600 m3 / day',
                        2 => 'UF',
                        3 => 'Engineering',
                    ],
                    50 => [
                        0 => 'Water Treatment Plant',
                        1 => '100 m3 / day',
                        2 => 'WTP',
                        3 => 'Engineering',
                    ],
                    51 => [
                        0 => 'Water Treatment Plant',
                        1 => '200 m3 / day',
                        2 => 'WTP',
                        3 => 'MEP Consultant',
                    ],
                    52 => [
                        0 => 'Drinking Water System',
                        1 => '20 m3 / day',
                        2 => 'UF',
                        3 => 'EPC',
                    ],
                    53 => [
                        0 => 'Drinking Water System',
                        1 => '10 m3 / day',
                        2 => 'UF',
                        3 => 'Residential',
                    ],
                    54 => [
                        0 => 'Water Treatment Plant',
                        1 => '200 m3 / day',
                        2 => 'WTP',
                        3 => 'MEP Consultant',
                    ],
                    55 => [
                        0 => 'Drinking Water System',
                        1 => '10 m3 / day',
                        2 => 'UF',
                        3 => 'Residential',
                    ],

                    56 => [
                        0 => 'Drinking Water System',
                        1 => '40 m3 / day',
                        2 => 'RO',
                        3 => 'Residential',
                    ],
                    57 => [
                        0 => 'Effluent Recycle',
                        1 => '540 m3 / day',
                        2 => 'UF',
                        3 => 'Engineering',
                    ],
                    58 => [
                        0 => 'WTP for Domestic Use',
                        1 => '170 m3 / day',
                        2 => 'WTP',
                        3 => 'Infrastructure',
                    ],
                ],
            ];
        }
        elseif($project_name == 'waste-water-management-project'){
            $seo_titleTag = 'Waste Water Management Projects | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Sparkle Clean Tech has treated Reinjection of Produced waste water management for ONGC in Oil & Gas Industry.';
            $project_title = 'Waste Water Management';

            $project = [
                'project_client_logo' => 'ongc.jpg',
                'project_client_name' => 'ONGC',
                'project_treatment_solution' => 'Reinjection of Produced Water',
                'project_sector' => 'Oil & Gas Industry',

                'content_title' => [
                    0 => 'Capacity',
                    1 => 'Process',
                    2 => 'Sector',
                ],

                'project_details' => [
                    0 => [
                        0 => '600 m3 / day',
                        1 => 'Site 1',
                        2 => 'UF',
                    ],
                    1 => [
                        0 => '2000 m3 / day',
                        1 => 'Site 2',
                        2 => 'UF',
                    ],
                    2 => [
                        0 => '2000 m3 / day',
                        1 => 'Site 3',
                        2 => 'UF',
                    ],
                    3 => [
                        0 => '2000 m3 / day',
                        1 => 'Site 4',
                        2 => 'UF',
                    ],
                    4 => [
                        0 => '5000 m3 / day',
                        1 => 'Site 5',
                        2 => 'UF',
                    ],
                    5 => [
                        0 => '5000 m3 / day',
                        1 => 'Site 6',
                        2 => 'UF',
                    ],
                ],
            ];


            $treatment = [
                'treatment_heading' => 'Waste Water Treatment Plants',
                'treatment_title' => [
                    0 => 'Treatment',
                    1 => 'Capacity',
                    2 => 'Process',
                    3 => 'Site',
                ],
                'treatment_details' => [
                    0 => [
                        0 => 'Domestic and Drinking Water purpose',
                        1 => '30 m3 / day',
                        2 => 'MBR',
                        3 => 'EPC',
                    ],
                    1 => [
                        0 => 'Sewage Recycle',
                        1 => '55 m3 / day',
                        2 => 'MBR',
                        3 => 'Engineering',
                    ],
                    2 => [
                        0 => 'Sewage Recycle',
                        1 => '30 m3 / day',
                        2 => 'Site 3',
                        3 => 'EPC',
                    ],
                    3 => [
                        0 => 'Effluent from Textile Industry',
                        1 => '5 m3 / day',
                        2 => 'ETP-MBR',
                        3 => 'Textile',
                    ],
                    4 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '60 m3 / day',
                        2 => 'SAFF STP',
                        3 => 'Hotel',
                    ],
                    5 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '275 m3 / day',
                        2 => 'STP(SAFF)',
                        3 => 'Infrastructure',
                    ],
                    6 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '60 m3 / day',
                        2 => 'STP(MBR)',
                        3 => 'Environmental',
                    ],
                    7 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '5 m3 / day',
                        2 => 'STP(SAFF)',
                        3 => 'Consultant',
                    ],
                    8 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '550 m3 / day',
                        2 => 'STP(MBR)',
                        3 => 'Environmental',
                    ],
                    9 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '600 m3 / day',
                        2 => 'STP(MBR)',
                        3 => 'Environmental',
                    ],
                    10 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '6 m3 / day',
                        2 => 'STP(MBR)',
                        3 => 'Environmental',
                    ],
                    11 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '60 m3 / day',
                        2 => 'STP(SAFF)',
                        3 => 'Hotel',
                    ],
                    12 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '125 m3 / day',
                        2 => 'STP(MBBR)',
                        3 => 'Infrastructure',
                    ],
                    13 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '10 m3 / day',
                        2 => 'STP(SAFF)',
                        3 => 'Consultant',
                    ],
                    14 => [
                        0 => 'Effluent Treatment Plant',
                        1 => '5 m3 / day',
                        2 => 'ETP',
                        3 => 'Consultant',
                    ],
                    15 => [
                        0 => 'Effluent Treatment Plant',
                        1 => '1 m3 / day',
                        2 => 'OWSU',
                        3 => 'Consultant',
                    ],
                    16 => [
                        0 => 'Sewage Treatment Plant',
                        1 => '6 m3 / day',
                        2 => 'STP(MBR)',
                        3 => 'Environmental',
                    ],
                    17 => [
                        0 => 'Sewage Recycle',
                        1 => '10 m3 / day',
                        2 => 'MBR',
                        3 => 'Engineering',
                    ],
                    18 => [
                        0 => 'Sewage Recycle',
                        1 => '10 m3 / day',
                        2 => 'MBR',
                        3 => 'Resort',
                    ],
                    19 => [
                        0 => 'Effluent Treatment Plant',
                        1 => '5 m3 / day',
                        2 => 'ETP',
                        3 => 'Industry',
                    ],
                ],
            ];
        }
        elseif($project_name == 'government-project'){
            $seo_titleTag = 'Government Project | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Sparkle Clean Tech has under taken various, Government Projects in Madhya Pradesh, Maharashtra & Chattishgard.';
            $project_title = 'Government Project';

            $table = [
                'Madhya Pradesh' => [
                    'table_head' => [
                        0 => 'End User',
                        1 => 'Process',
                        2 => 'Capacity',
                        3 => 'Treatment ',
                    ],
                    'table_body' => [
                        0 => [
                            0 => 'Bhadnavar Municipal Corporation',
                            1 => 'UF',
                            2 => '1000 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        1 => [
                            0 => 'Rajgad Municipal Corporation',
                            1 => 'UF',
                            2 => '1000 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        2 => [
                            0 => 'Ex Engg, Gwalior, Muraina, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        3 => [
                            0 => 'Ex Engg, Alirjpur, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        4 => [
                            0 => 'Ex Engg, Jhabua, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        5 => [
                            0 => 'Ex Engg, Balaghat, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        6 => [
                            0 => 'Ex Engg, Dindosi, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        7 => [
                            0 => 'Ex Engg, Mandla, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        8 => [
                            0 => 'Ex Engg, Chhindwada, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        9 => [
                            0 => 'Ex Engg, Bhopal, Sehore, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        10 => [
                            0 => 'Ex Engg, Bhopal, Sehore, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                        11 => [
                            0 => 'Ex Engg, Gwalior, Bhind, M.P',
                            1 => 'UF',
                            2 => '10 m3 / day',
                            3 => 'Drinking Water System',
                        ],
                    ],
                ],
                'Maharashtra' => [
                    'table_head' => [
                        0 => 'End User',
                        1 => 'Process',
                        2 => 'Capacity',
                        3 => 'Treatment ',
                    ],
                    'table_body' => [
                        0 => [
                            0 => 'Khursapar, Chimur Nagpur',
                            1 => 'RO',
                            2 => '5 m3 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        1 => [
                            0 => 'Chichghat, Chimur Nagpur',
                            1 => 'RO',
                            2 => '5 m3 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        2 => [
                            0 => 'Baradghat, Chimur Nagpur  ',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        3 => [
                            0 => 'Chak Katwan, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        4 => [
                            0 => 'Karwan, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        5 => [
                            0 => 'Ghot, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        6 => [
                            0 => 'Saranghad, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        7 => [
                            0 => 'Bhivkund, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        8 => [
                            0 => 'Chikhalapar, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        9 => [
                            0 => 'Borgaon, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        10 => [
                            0 => 'Gadmashi, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        11 => [
                            0 => 'Urkudpar, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        12 => [
                            0 => 'Pijdura, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        13 => [
                            0 => 'Nimdhela, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        14 => [
                            0 => 'Lahujinagar, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                        15 => [
                            0 => 'Dongargaon, Water Supply & Sanitaion Dept',
                            1 => 'RO',
                            2 => '10 53 / day',
                            3 => 'Fluoride Removal RO Plant',
                        ],
                    ],
                ],
                'Chattisgarh' => [
                    'table_head' => [
                        0 => 'End User',
                        1 => 'Process',
                        2 => 'Capacity',
                        3 => 'Treatment ',
                    ],
                    'table_body' => [
                        0 => [
                            0 => 'Speciality Products for PHED Chhattisgarh Govt. in various Villages',
                            1 => 'RO',
                            2 => '10m3/day (FRP Systems)12 Nos.',
                            3 => 'Fluoride Removal RO Plants',
                        ],
                        1 => [
                            0 => 'Speciality Products for PHED Chhattisgarh Govt. in various Villages',
                            1 => 'RO',
                            2 => '10m3/day (FRP Systems)12 Nos.',
                            3 => 'Fluoride Removal RO Plants',
                        ],
                    ],
                ],
            ];            
        }
        else {
            App::abort(404);
            exit;
        }

        return view('web_pages.projects', [
            'project_title' => $project_title,
            'project' => $project,
            'treatment' => $treatment,
            'table' => $table,
            'seo_titleTag' => $seo_titleTag,
            'seo_metaDesc' => $seo_metaDesc
        ]);       
    }

    public function getProducts()
    {
        return [
            'pressure-sand-filter' => [
                'seo_titleTag' => 'Pressure & Sand Filter | Sparkle Clean Tech',
                'seo_keywords' => 'pressure sand filtration water treatment, pressure sand filtration water treatment India, Waste Water Treatment Plant Manufacturers, Water Treatment Plant india',
                'seo_metaDesc' => 'A sand bed filter is a kind of depth filter used to separate small amounts (<10 parts per million) of fine solids (<100 micrometres) from aqueous solutions.',
                'product_heading' => 'Pressure & Sand Filter',
                'product_image' => 'pressure-sand-filter.jpg',
                'product_imageAlt' => 'Pressure and Sand Filter',
                'product_url' => route('products','pressure-sand-filter'),
                'product_desc' => [
                    0 => 'A sand bed filter is a kind of depth filter used to separate small amounts (<10 parts per million or <10 g per cubic metre) of fine solids (<100 micrometres) from aqueous solutions.',
                    1 => 'Pre treated water passes through Sand filters to remove suspended impurites. Sand bed filters are used for both fresh and waste water filteration.'
                ],
                'technology' => "depth-filtration-technology",
            ],
            'activated-carbon-filter' => [
                'seo_titleTag' => 'Activated Carbon Filter | Sparkle Clean Tech',
                'seo_keywords' => 'Activated carbon filter, Activated carbon filter india, Waste Water Treatment Plant Manufacturers, wastewater treatment plants manufacturers in india, Waste Water Treatment Plant',
                'seo_metaDesc' => 'Carbon filtering is a method of filtering that uses a bed of activated carbon to remove contaminants and impurities, using chemical adsorption.',
                'product_heading' => 'Activated Carbon Filter',
                'product_image' => 'activated-carbon-filter.jpg',
                'product_imageAlt' => 'Activated Carbon Filter',
                'product_url' => route('products','activated-carbon-filter'),
                'product_desc' => [
                    0 => 'Carbon filtering is a method of filtering that uses a bed of activated carbon to remove contaminants and impurities, using chemical adsorption. Activated carbon works via a process called adsorption, whereby pollutant molecules in the fluid to be treated are trapped inside the pore structure of the carbon substrate. Carbon filtering is commonly used for <a href="http://www.sparklecleantech.com/waste-water-management-solution" style="color:#42a5f6;font-weight:600;">water purification</a>.',
                ],
                'technology' => "depth-filtration-technology",
            ],
            'iron-removal-filter' => [
                'seo_titleTag' => 'Iron Removal Filter | Sparkle Clean Tech',
                'seo_keywords' => 'Ion Exchange, Water Treatment Plant india, industrial sea water reverse osmosis, Waste Water Treatment Plant Manufacturers, Waste Water Treatment Plant',
                'seo_metaDesc' => 'Iron can be removed from water, either in its soluble form or insoluble form. As soluble ferrous ions, iron removal.',
                'product_heading' => 'Iron Removal Filter',
                'product_image' => 'iron-removal-filter.jpg',
                'product_imageAlt' => 'Iron Removal Filter',
                'product_url' => route('products','iron-removal-filter'),
                'product_desc' => [
                    0 => 'Iron can be removed from water, either in its soluble form or insoluble form.
                        As soluble ferrous ions, iron removal can be carried out by the following process :',

                    1 => '(1) Ion exchange using a metal selective (chelating) strong acid cation resin.',

                    2 => '(2) Reverse osmosis provided the total iron in the feed water is < 0.05 mg/l.',

                    3 => 'There are several main types of processes that can achieve removal of total iron from water, via its insoluble forms :',
                    4 => '(1) Chemical oxidation -  
                        Strong oxidants such as ozone, hydrogen peroxide and chlorine can be dosed to fully oxidise soluble iron to insoluble ferric hydroxide for its removal by clarification or filtration.',

                    5 =>'(2) Media adsorption - Various active medias can be used in presence of chlorine which acts as catalyse for oxidation reactions. The media also serves to filter out the suspended particles of ferric hydroxide produced.',

                    6 =>'(3) pH adjustment - 
                            The pH can be adjusted to above 8 by aeration and/or dosing caustic. Flocculation is then carried out to maximise particle size, before removal by either clarification or filtration.
                            The above processes are all capable of achieving total iron reductions down to the 0.3 mg/l limit set for potable water.',
                ],
                'technology' => "depth-filtration-technology",
            ],
            'multigrade-filtration' => [
                'seo_titleTag' => 'Multigrade Filtration | Sparkle Clean Tech',
                'seo_keywords' => 'Multigrade Filtration, multigrade filtration system, multigrade filtration system in India, multigrade fiter, multigrade filtration manufacturers',
                'seo_metaDesc' => 'Multigrade filter have more than one media for filteration.The outlet of multigrade fiter can give less than 2 ppm turbidity.',
                'product_heading' => 'Multigrade Filtration',
                'product_image' => 'multigrade_filtration.jpg',
                'product_imageAlt' => 'Multigrade Filtration',
                'product_url' => route('products','multigrade-filtration'),
                'product_desc' => [
                    0 => 'To achieve better results in terms of specific flow and outlet quality multigrade filters are being used. Multigrade filter have more than one media for filteration. Other than filtering sand more poros media are utilized for filteration, entrasite and garnet are the examples of those kind of medias.',
                    1 => 'Because of their better porosity they are used as the primary filtering media along with the filtering sand as second level. The outlet of multigrade fiter can give less than 2 ppm turbidity.'
                ],
                'technology' => "depth-filtration-technology",
            ],

            'micron-cartridge-filter' => [
                'seo_titleTag' => 'Micron Cartridge Filter | Sparkle Clean Tech',
                'seo_keywords' => 'Micron Cartridge Filter, micron cartridge filter supplier, micron filter cartridge manufacturers india, Micron Cartridge Filter plant, Micron Cartridge Filter plant in india, micron cartridge filter supplier in india',
                'seo_metaDesc' => 'Micron Catridge filters restrict as per its rating up to 0.2 microns of particulate matter in water. Catridges could be of inert polymer material or steel.',
                'product_heading' => 'Micron Cartridge Filter',
                'product_image' => 'micron_cartridge_filter.jpg',
                'product_imageAlt' => 'Micron Cartridge Filter',
                'product_url' => route('products','micron-cartridge-filter'),
                'product_desc' => [
                    0 => 'Micron Catridge filters restricts, as per its rating, up to 0.2 microns of particulate matter in water. Catridges could be of inert polymer material or of steel. Catridge filters are of two types, absolute filters and nominal filters. Absolute rating filters 99.9% are of particulate matter above the rated microns. Nominal Filter between 80 - 90 % of particulate matter above the rated micron. The major use of Micron Catradige filters is that of pre / guard filter of ultra filteration and Reverse Osmosis. For removal of bacteria and pyrogens for high purity water utilised for pharmaceutical industry.',
                ],
                'technology' => "micro-membrane-technology",
            ],
            'ultra-filtration' => [
                'seo_titleTag' => 'Ultra Filtration | Sparkle Clean Tech',
                'seo_keywords' => 'Ultrafiltration, Ultrafiltration Manufacturers, ultrafiltration system, ultrafiltration Manufacturers in India',
                'seo_metaDesc' => 'Ultrafiltration (UF) is a variety of membrane filtration in which hydrostatic pressure forces a liquid against a semi permeable membrane.',
                'product_heading' => 'Ultra Filtration',
                'product_image' => 'utlra_filtration.jpg',
                'product_imageAlt' => 'Ultra Filtration',
                'product_url' => route('products','ultra-filtration'),
                'product_desc' => [
                    0 => 'Ultrafiltration (UF) is a variety of membrane filtration in which hydrostatic pressure forces a liquid against a semi permeable membrane. Suspended solids and solutes of high molecular weight are retained, while water and low molecular weight solutes pass through the membrane.',
                    1 => 'Ultrafiltration technology produces superior quality water by removing virtually all harmful pathogens and suspended solids. Ultrafiltration membranes are designed for Cross Flow and Dead End filtration. In Cross Flow filtration a portion of the feed passes through the membrane and is called permeate. The rejected materials are flushed away in a stream called the concentrate. Cross Flow membrane filtration uses a high cross flow rate to enhance permeate passage and reduce membrane fouling.',
                    2 => 'Hollow fibre membranes also have the capability to be backwashed, where filtered water is pushed backwards through the membrane to remove accumulated solids on the membrane surface. Ultrafiltration systems provide flexibility to operate in a range of conditions that can be optimized for a specific water source to reduce operating costs.',
                ],
                'technology' => "micro-membrane-technology",
            ],

            'softener' => [
                'seo_titleTag' => 'Softening Solution using ion exchange | Sparkle Clean Tech',
                'seo_keywords' => 'Ion Exchange, softener plant, water softener plant, ion exchange water treatment, ion exchange water treatment plant, Waste Water Treatment Plant, Industrial Waste Water Treatment Plant',
                'seo_metaDesc' => 'Water softening solution using ion exchange for food & beverage, hydrometallurgy, metals finishing, chemical & petrochemical, pharmaceutical, and a host of other industries.',
                'product_heading' => 'Softener',
                'product_image' => 'water-softening.jpg',
                'product_imageAlt' => 'Water softening solution',
                'product_url' => route('products','softener'),
                'product_desc' => [
                    0 => 'Water softening is the removal of calcium, magnesium, and certain other metal cations in hard water. The resulting soft water is more compatible with soap and extends the lifetime of plumbing. Water softening is usually achieved using lime softening or ion-exchange resins. It is widely used in the food & beverage, hydrometallurgy, metals finishing, chemical & petrochemical, pharmaceutical, sugar & sweeteners, ground & potable water, nuclear, softening & industrial water, semiconductor, power, and a host of other industries.',
                ],
                'technology' => 'ion-exchange-technology',
            ],
            'dm-plant-2-bed' => [
                'seo_titleTag' => 'Two bed demineralisation | Sparkle Clean Tech',
                'seo_keywords' => 'Two bed demineralisation, Two bed demineralisation in india, demineralisation process,Demineralization plant in India, demineralization water treatment plant',
                'seo_metaDesc' => 'Demineralization process is usually done when the water is to be used for chemicals processes and the minerals present may interfere with the other chemicals.',
                'product_heading' => 'Two bed Demineralisation',
                'product_image' => 'two-bed-demineralisation.jpg',
                'product_imageAlt' => 'Two bed demineralisation',
                'product_url' => route('products','dm-plant-2-bed'),
                'product_desc' => [
                    0 => 'Demineralization is often a term used interchangeably with deionization. Demineralization is essentially removing all the minerals that can be found in water. This process is usually done when the water is to be used for chemicals processes and the minerals present may interfere with the other chemicals. For eg. all chemistic and beauty products have to be made with demineralized water for this reason. With the demineralization process, the water is "softened" replacing the undesired minerals with different salts (NaCl). Demineralized water has a higher conductivity than deionized water.',
                ],
                'technology' => 'ion-exchange-technology',
            ],
            'dm-plant-3-bed' => [
                'seo_titleTag' => 'Three bed demineralisation | Sparkle Clean Tech',
                'seo_keywords' => 'Three bed demineralisation, Demineralization plant, Three bed demineralisation plant in india, Three bed demineralisation in india, Three bed demineralisation plant, demineralization water treatment plant',
                'seo_metaDesc' => 'Process which requires water to be of higher purity then 2 bed D M Plant system mixed is included. Mixed bed comprises of both Cation and anion.',
                'product_heading' => 'Three bed Demineralisation',
                'product_image' => 'three-bed-demineralisation.jpg',
                'product_imageAlt' => 'Three bed demineralisation',
                'product_url' => route('products','dm-plant-3-bed'),
                'product_desc' => [
                    0 => 'When the process requires water to be of higher purity then <a href="http://www.sparklecleantech.com/products/dm-plant-2-bed" style="color:#42a5f6;font-weight:600;">2 bed D M Plant</a> system mixed is included. <a href="http://www.sparklecleantech.com/products/standalone-mixed-bed" style="color:#42a5f6;font-weight:600;">Mixed bed</a> comprises of both Cation and anion. This mixed bed is used essentially as a extension.',
                ],
                'technology' => 'ion-exchange-technology',
            ],
            'standalone-mixed-bed' => [
                'seo_titleTag' => 'Standalone Mixed bed | Sparkle Clean Tech',
                'seo_keywords' => 'Ion exchange, ion exchange water treatment, Waste Water Treatment Plant, Three bed demineralisation, Waste Water Treatment Plant Manufacturers',
                'seo_metaDesc' => 'Mixed bed deionization is a mixture of cation and anion resin combined in a single ion exchange column.',
                'product_heading' => 'Standalone Mixed bed',
                'product_image' => 'standalone-mixed-bed.jpg',
                'product_imageAlt' => 'Standalone Mixed bed',
                'product_url' => route('products','standalone-mixed-bed'),
                'product_desc' => [
                    0 => 'Mixed bed deionization is a mixture of cation and anion resin combined in a single <a href="http://www.sparklecleantech.com/ion-exchange-technology" style="color:#42a5f6;font-weight:600;">ion exchange</a> column. With proper pretreatment, product water purified from a single pass through a mixed bed ion exchange column is the purest that can be made. Most commonly, mixed bed demineralizers are used for final water polishing to clean the last few ions within water prior to use.',
                    1 => ' Small mixed bed deionization units have no regeneration capability. Commercial mixed bed deionization units have elaborate internal water and regenerant distribution systems for regeneration. A control system operates pumps and valves for the regenerants of spent anions and cations resins within the ion exchange column. Each is regenerated separately, then remixed during the regeneration process. Because of the high quality of product water achieved, and because of the expense and difficulty of regeneration, mixed bed demineralizers are used only when the highest purity water is required.',
                ],
                'technology' => 'ion-exchange-technology',
            ],

            'ro-plant' => [
                'seo_titleTag' => 'RO Plant Product | Sparkle Clean Tech Pvt.Ltd.',
                'seo_keywords' => 'RO Plant Manufacturers, ro plant manufacturers in mumbai, industrial sea water reverse osmosis, reverse osmosis plant manufacturers, reverse osmosis plant manufacturers in mumbai, Dialysis RO plants',
                'seo_metaDesc' => 'A Reverse Osmosis plant comprises of membranes made of polyaaid, etc. The spirally bound membranes are subjected to pressure to complete the process of RO.',
                'product_heading' => 'RO Plant',
                'product_image' => 'ro_plant.jpg',
                'product_imageAlt' => 'RO Plant',
                'product_url' => route('products','ro-plant'),
                'product_desc' => [
                    0 => 'A Reverse Osmosis plant comprises of membranes made of polyaaid, etc. The spirally bound membranes are subjected to pressure to complete the process of Reverse Osmosis. They are typically used whenever salt removal or deionization is required. Reverse osmosis removes more than 97%-99% of the total dissolved solids along with organics, bacteria and other particulates.',
                    1 => 'Reverso Osmosis is becoming more and more popular viz a viz ion exchange process because of input TDS restrictions in ion exchange and ease of operation.'
                ],
                'technology' => 'ro-technology',
            ],
            
            'high-rate-solid-contact-clarifier' => [
                'seo_titleTag' => 'High Rate Solid Contact clarifier (HRSCC) | Sparkle Clean Tech',
                'seo_keywords' => 'high rate solid contact clarifier (hrscc), High Rate Solid Contact clarifier in India, water treatment plants india, high rate solid contact clarifier, high rate solid contact clarifier plant, high rate solid contact clarifier in india',
                'seo_metaDesc' => 'HRSCC uses turbulence and high velocity to reduce silica load in the water apart from deduction of suspended impurities and turbidity.',
                'product_heading' => 'High Rate Solid Contact clarifier (HRSCC)',
                'product_image' => 'high-rate-solid-contact-clarifier.jpg',
                'product_imageAlt' => 'High Rate Solid Contact clarifier',
                'product_url' => route('products','high-rate-solid-contact-clarifier'),
                'technology' => 'setting-coagulation-flocculation-oil-seperation-technology',
                'product_desc' => [
                    0 => 'HRSCC uses turbulence and high velocity to reduce silica load in the water apart from deduction of suspended impurities and turbidity. HRSCC requires lesser area and process time and thereby, reduces the initial civil cost of the plant.',
                ],
            ],
            'dissolved-air-flotation' => [
                'seo_titleTag' => 'Dissolved Air Flotation (DAF) | Sparkle Clean Tech',
                'seo_keywords' => 'Dissolved Air Flotation (DAF), Dissolved Air Flotation Manufacturers, wastewater treatment plants in india, Dissolved Air Flotation Manufacturers in india, industrial wastewater treatment plants, dissolved air flotation system in india',
                'seo_metaDesc' => 'Dissolved air flotation is very widely used in treating the industrial wastewater effluents from oil refineries, petrochemical and chemical plants',
                'product_heading' => 'Dissolved Air Flotation (DAF)',
                'product_image' => 'dissolved-air-flotation.jpg',
                'product_imageAlt' => 'Dissolved Air Flotation',
                'product_url' => route('products','dissolved-air-flotation'),
                'technology' => 'setting-coagulation-flocculation-oil-seperation-technology',
                'product_desc' => [
                    0 => 'Dissolved air flotation (DAF) is a <a href="http://www.sparklecleantech.com/water-management-solution" style="color:#42a5f6;font-weight:600;">water treatment</a> process that clarifies wastewaters (or other waters) by the removal of suspended matter such as oil or solids. The removal is achieved by dissolving air in the water or wastewater under pressure and then releasing the air at atmospheric pressure in a flotation tank basin. The released air forms tiny bubbles which adhere to the suspended matter causing the suspended matter to float to the surface of the water where it may then be removed by a skimming device.',
                    1 => 'Dissolved air flotation is very widely used in treating the industrial wastewater effluents from oil refineries, petrochemical and chemical plants, natural gas processing plants, paper mills, general water treatment and similar industrial facilities. A very similar process known as induced gas flotation is also used for <a href="http://www.sparklecleantech.com/water-management-solution" style="color:#42a5f6;font-weight:600;">wastewater treatment</a>. Froth flotation is commonly used in the processing of mineral ores.',
                    2 => 'In the oil industry, dissolved gas flotation (DGF) units do not use air as the flotation medium due to the explosion risk. Nitrogen gas is used instead to create the bubbles.',
                ],
            ],
            'clari-flocculation' => [
                'seo_titleTag' => 'Clari - Flocculation | Sparkle Clean Tech',
                'seo_keywords' => 'Clari Flocculation, flocculation water treatment, flocculation water treatment in India, clarification and flocculation, clariflocculator, Clari Flocculation in india',
                'seo_metaDesc' => 'Clari Flocculation is a combination of clrifier and floculator combined in to clarifier and floculator.',
                'product_heading' => 'Clari - Flocculation',
                'product_image' => 'clari_flocculation.jpg',
                'product_imageAlt' => 'Clari - Flocculation',
                'product_url' => route('products','clari-flocculation'),
                'technology' => 'setting-coagulation-flocculation-oil-seperation-technology',
                'product_desc' => [
                    0 => 'As the name suggest Clari Floccution is a combination of clrifier and floculator combined in to clarifier and floculator. Physio chemical reaction of settling and floculation takes place in a clari floculator unit. There is sepearte chamber provided for dossing floculants in the unit. There are many types of Clari Floculators like Central drive, peripheral drive, agigator gate type etc.',
                ],
            ],
            'tube-plate-separation' => [
                'seo_titleTag' => 'Tube / Plate Separation | Sparkle Clean Tech',
                'seo_keywords' => 'Water Treatment Plant india, Ultrafiltration Manufacturers, Waste water recycling system, Ultraviolet systems, uv water treatment systems, ultraviolet system for water treatment, Tube or Plate Separation System, Tube or Plate Separation System in India',
                'seo_metaDesc' => 'Tube/Plate settlers provides particle settling depth that is significantly less than the settling depth of a conventional clarifier, reducing settling times.',
                'product_heading' => 'Tube / Plate Separation',
                'product_image' => 'tube-separation.jpg',
                'product_imageAlt' => 'Tube / Plate Separation',
                'product_url' => route('products','tube-plate-separation'),
                'technology' => 'setting-coagulation-flocculation-oil-seperation-technology',
                'product_desc' => [
                    0 => "Tube / Plate/ Lamella settlers are modern unconventional solid - liquid separation systems units. These settling units due to higher settling area and effective arrangement of multiple tubular channels sloped at an angle of 55°- 60° and adjacent to each other, increases the rate of settling.
                        These modern settlers provides  particle settling depth that is significantly less than the settling depth of a conventional clarifier, reducing settling times.
                        Tube settlers capture the settleable fine floc that escapes the clarification zone beneath the tube settlers and allows the larger floc to travel to the tank bottom in a more settleable form.",
                    1 => "<strong>Why Tube Settlers ?</strong>",
                    2 => "The Tube settler contains inert, non corrosive UV resistant PVC inert media placed in inclined manner  and arranged in structured manner with its self interlocking system. The smooth surface ,inclined arrangement and adequately designed void space  helps large solids, flocs and particulate matter the move downwards of the settler. The tube setters has sharp conical bottom which enables to effective setting and reduces footprint. Due to such arrangement the extra mechanical scrapping arrangement which is usually and integral part of conventional clarifier is not required. This also provides benefit of choice of geometry of settling unit which is very essential during space planning of compact systems.
                        The tube settler's channel collects solids into a compact mass which promotes the solids to slide down the tube channel. 
                        Tube settlers offer an inexpensive method of upgrading existing <a href='http://www.sparklecleantech.com/water-management-solution' style='color:#42a5f6;font-weight:600;'>water treatment plant</a> clarifiers and sedimentation basins to improve performance.
                        They can also reduce the tankage/footprint required in new installations or improve the performance of existing settling basins by reducing the solids loading on downstream filters. 
                        Made of lightweight PVC, tube settlers can be easily supported with minimal structures that often incorporate the effluent trough supports.
                        They are available in a variety of module sizes and tube lengths to fit any tank geometry, with custom design and engineering offered by the manufacturer.",
                    3 => "<strong>Advantages of Tube Settlers</strong>",
                    4 => "<p>The advantages of tube settlers can be applied to new or existing clarifiers/basins of any size:</p> 
                        <ul>
                            <li>
                                Clarifiers/basins equipped with tube settlers can operate at 2 to 4 times the normal rate of clarifiers/basins without tube settlers.
                            </li>
                            <li>
                                It is possible to cut/ reduce  coagulant dosage by up to half while maintaining a lower influent turbidity to the treatment plant filters.
                            </li>
                            <li>
                                Saves electricity as no mechanical and rotating equipment's it also lowers Operational Expenditure(OPEX).
                            </li>
                            <li>
                                Less filter backwashing of downstream units equates to significant operating cost savings for both water and electricity.
                            </li>
                            <li>
                                New installations using tube settlers can be designed smaller because of increased flow capability. 
                            </li>
                            <li>
                                Flow of existing water treatment plants can be increased through the addition of tube settlers. 
                            </li>
                            <li>
                                Tube settlers increase allowable flow capacity by expanding settling capacity and increasing the solids removal rate in settling tanks.
                            </li>
                            <li>
                                Extended life of unit as no mechanical or rotating units are involved. 
                            </li>
                            <li>
                                Inert PVC material has very long life and can be replaced or top-uped easily.
                            </li>
                        </ul>",
                ],
            ],

            'corrugulated-plate-intersected' => [
                'seo_titleTag' => 'Corrugulated Plate Intersected (CPI) | Sparkle Clean Tech',
                'seo_keywords' => 'Oil Separation from waste water, Oily waste water Treatment Plant, Oily waste water Treatment Plant in India, Waste Water Treatment Plant for Oil',
                'seo_metaDesc' => 'Corrugulated Plate Intersected (CPI) oil separators are predominantly used in separation of free oil & suspended solids from produced or oily wastewater.',
                'product_heading' => 'Corrugulated Plate Intersected (CPI)',
                'product_image' => 'corrugulated-plate-intersected.jpg',
                'product_imageAlt' => 'Corrugulated Plate Intersected (CPI)',
                'product_url' => route('products','corrugulated-plate-intersected'),
                'technology' => 'oil-seperation-technology',
                'product_desc' => [
                    0 => 'The CPI(corrugated plate interceptor) <a href="http://www.sparklecleantech.com/oil-seperation-technology" style="color:#42a5f6;font-weight:600;">oil separators</a> are predominantly used in separation of free oil &amp; suspended solids from produced or oily wastewater. CPIs are used to remove free and floating type of oils. It works on basic principle of difference in gravity between the phases (liquid – liquid or solid – liquid). CPI Oil Separators enable high efficiency gravity separation with corrugated plates, providing excellent treatability with a high flow rate. The simple structure makes it possible to reduce the construction cost and facilitates maintenance.',
                    1 => 'The CPI oil-water separator series are designed to create the optimal circumstances for easy separation of the oil and water. The installed corrugated lamella plate packs creates a large effective surface area, creating a high separation area. The separated oil is collected with a skimmer pipe and can be discharged with a pump or gravity.',
                    2 => 'The corrugated plates are arranged with short void space or plate pack media. It is used for providing high oil-water separation efficiency due to narrow passage. This also helps to arrest the floating solids to travel up words and settles it down which is removed from bottom drain. The plate packs used are of inert MOC to avoid corrosion.',
                    3 => 'Compared to the PPI (Parallel Plate Interceptor), the CPI Oil Separator requires small footprint which is about 30-35% lesser than conventional PPI. Other advantages include the low capital cost, simple structure and facilitative maintenance.'
                ],
            ],
            'inducted-gas-flotation' => [
                'seo_titleTag' => 'Inducted Gas Flotation (IGF) | Sparkle Clean Tech',
                'seo_keywords' => 'Inducted Gas Flotation Manufacturers, Waste Water Treatment Plant, Oily waste water Treatment Plant, Oil Separation from waste water, Waste Water Treatment Plant Manufacturers',
                'seo_metaDesc' => 'Induced gas flotation (IGF) is a water treatment process that clarifies wastewaters (or other waters) by the removal of suspended matter such as oil or solids.',
                'product_heading' => 'Inducted Gas Flotation (IGF)',
                'product_image' => 'inducted-gas-flotation.jpg',
                'product_imageAlt' => 'Inducted Gas Flotation (IGF)',
                'product_url' => route('products','inducted-gas-flotation'),
                'technology' => 'oil-seperation-technology',
                'product_desc' => [
                    0 => 'Induced gas flotation (IGF) is a water treatment process that clarifies wastewaters (or other waters) by the removal of suspended matter such as oil or solids. The removal is achieved by injecting gas bubbles into the water or wastewater in a flotation tank or basin. The small bubbles adhere to the suspended matter causing the suspended matter to float to the surface of the water where it may then be removed by a skimming device.',
                    1 => 'Induced gas flotation is very widely used in treating the industrial wastewater effluents from oil refineries, petrochemical and chemical plants, natural gas processing plants and similar industrial facilities. A very similar process known as dissolved air flotation is also used for <a href="http://www.sparklecleantech.com/waste-water-management-solution" style="color:#42a5f6;font-weight:600;">waste water treatment</a>. Froth flotation is commonly used in the processing of mineral ores.',
                    2 => 'IGF units in the <a href="http://www.sparklecleantech.com/oil-and-gas-sector" style="color:#42a5f6;font-weight:600;">oil industry</a> do not use air as the flotation medium due to the explosion risk. These IGF units use natural gas or nitrogen to create the bubbles.',
                ],
            ],
            'nut-shell-filter' => [
                'seo_titleTag' => 'Nut Shell Filter (NSF) | Sparkle Clean Tech',
                'seo_keywords' => 'Nut Shell Filter water Treatment, Nut Shell Filter water Treatment in India, Waste Water Treatment Plant, Oil Separation from waste water, Waste Water Treatment Plant Manufacturers, Oily waste water Treatment Plant',
                'seo_metaDesc' => 'Nut Shell Filter is used for reduction of oil, NSF is used after either CPI stored TPI or IGF. Charred Nut Shell Media has very high affinity towards oil.',
                'product_heading' => 'Nut Shell Filter (NSF)',
                'product_image' => 'nut-shell-filter.jpg',
                'product_imageAlt' => 'Nut Shell Filter (NSF)',
                'product_url' => route('products','nut-shell-filter'),
                'technology' => 'oil-seperation-technology',
                'product_desc' => [
                    0 => 'Charred Nut Shell Media has very high affinity towards oil. Owing to its porosity it also is a very good filtering media. For reduction of oil, nut shell filter is used after either CPI stored TPI or IGF. Nut Shell filter removes upto 95 - 98 % free oil from the oily water. It also takes care of other hydro carbons. Almost all nut shell design are simple to operate, hence very easy to maintain.',
                ],
            ],
            'oil-skimmer' => [
                'seo_titleTag' => 'Oil Skimmer | Sparkle Clean Tech',
                'seo_keywords' => 'Oily waste water Treatment Plant, Waste Water Treatment Plant, Oil Separation from waste water, Waste Water Treatment Plant Manufacturers, Oily waste water Treatment Plant India',
                'seo_metaDesc' => 'An oil skimmer is a device that separates free and floating type oil from wastewater/ effluent. A common application is removing oil floating on water.',
                'product_heading' => 'Oil Skimmer',
                'product_image' => 'oil_skimmer.jpg',
                'product_imageAlt' => 'Oil Skimmer',
                'product_url' => route('products','oil-skimmer'),
                'technology' => 'oil-seperation-technology',
                'product_desc' => [
                    0 => "An oil skimmer is a device that separates  free and floating type oil from wastewater/ effluent. A common application is removing oil floating on water. Oil skimmers are different from <a href='http://www.sparklecleantech.com/oil-and-gas-solution' style='color:#42a5f6;font-weight:600;'>oil water separators</a> and the primary intension of skimmer is to skim-off the oil layer which is separated by phase separation process which is similar to oil water separators.",
                    1 => "The skimming  units are broadly available in two types i.e. Manual skimmers and mechanical skimmers. The manual skimmers are generally available in SS 304, CI or MS EP  construction MOC or can be customized as per requirement in civil - RCC.",
                    2 => "Mechanical oil skimmers are units attached with various form of skimming  unit  like Belt type,  Tube type, Rotating Disc type, Funnel type, slotted pipe type, floating suction type, and drum type etc. The type of skimmer is selected as per adequate application and type of oil.",
                ],
            ],

            'extended-aeration' => [
                'seo_titleTag' => 'Extended Aeration | Sparkle Clean Tech',
                'seo_keywords' => 'Extended Aeration, Waste Water Treatment Plant Manufacturers, Waste Water Treatment Plant, Water Treatment Plant india, Effluent Treatment Plant',
                'seo_metaDesc' => 'Extended aeration is Aerobic biological treatment. The wastewater is brought directly to the aeration basin after screening and grit removal',
                'product_heading' => 'Extended Aeration',
                'product_image' => 'extended_aeration.jpg',
                'product_imageAlt' => 'Extended Aeration',
                'product_url' => route('products','extended-aeration'),
                'product_desc' => [
                    0 => 'Extended aeration is aerobic biological treatment process used in wastewater treatment. This process is principally modified version of most commonly used and proven technology i.e. activated sludge process. Extended aeration systems are simpler in construction and operation. The wastewater is brought directly to the aeration basin after screening and grit removal.',
                    1 => ' In aeration basin the aeration is carried out for extended period of time thus mineralizing the sludge solids sufficiently hence the sludge produced is completely digested. Extended aeration is a method of sewage treatment using acclimatized active biomass, the oxygen for bioprocess is provided from mechanical aeration system of blowers and fine bubble diffusers. The suitable  ratio of food to microorganism (F : M) is maintained for effective process operation. The microorganisms maintained in reactor carries out digestion of oxygen demanding impurities present in wastewater and hence the treated water is with very low concentration of biological and chemical oxygen demand. The clarifier or tube settler downstream is used to carrying out solid- liquid separation, settled sludge at bottom of reactor is partly recycled back for process, excessive sludge is sent for sludge dewatering treatment.',
                    2 => ' The ability of absorbing flow and qualitative shock loads due to higher detention time makes it preferred and reliable treatment process. This type of treatment process is very commonly used worldwide and in major industrial applications of wastewater/ effluent treatment.',
                ],
                'technology' => 'actuated-sludge-technology',
            ],
            'sequential-batch-reactor' => [
                'seo_titleTag' => 'Sequential Batch Reactor | Sparkle Clean Tech',
                'seo_keywords' => 'Sequential Batch Reactor (SBR), Sequential Batch Reactor, Sequential Batch Reactor Manufacturers, Sequential Batch Reactor Manufacturers in mumbai, Domestic water treatment, domestic water treatment plant',
                'seo_metaDesc' => 'Sequential Batch Reactor is an derivative of activated sludge process designed to operate under non-steady state conditions.',
                'product_heading' => 'Sequential Batch Reactor - SBR',
                'product_image' => 'sequential_batch_reactor.jpg',
                'product_imageAlt' => 'Sequential Batch Reactor (SBR)',
                'product_url' => route('products','sequential-batch-reactor'),
                'product_desc' => [
                    0 => 'The Sequencing Batch Reactor (SBR) is a derivative of activated sludge process designed to operate under non-steady state conditions. Like extended aeration or other activated sludge process it involves the biological process, microorganisms and mechanical aeration system for aeration along with air distributors and diffusers. However the major difference in involved is in operation of treatment which is carried out in batches in cyclic manner. In SBR configuration all related processes of Aeration, Settling, Decanting are carried out in same basin and eventually this reduces construction cost which is very essential in larger systems. The most important component of SBR process is decanting system. The various type of decanters are used for process like Floating gravity type, rake arm type, floating funnel type and slotted pipe type decanters. The process is operated in batch manner and hence it is vary suitable for industrial wastewater and high flow domestic wastewater. The added advantages are it provides BNR ( biological nutrients removal) and completely digested sludge which makes sludge treatment process easier.',
                    1 => 'SBR is modern wastewater treatment system which involves use of automation in operation. The control of cyclic batch operation is programmed in PLC or SCADA. The instruments involved in process helps to transmit appropriate signal and control the system. The automation of system reduces the number of operator skill and attention requirement and hence improves output quality of treated effluent.',
                    2 => 'Sparkle offers unique design of sequential batch reactor decanting system which involves simple automation and gravity based decanting system. The power requirement for decanting operation is eliminated in this design.',
                    3 => 'Advantages:
                        economical construction due to single tank design.
                        The system can absorb  higher shock loads.
                        Provides 95-98% removal in BOD.',
                ],
                'technology' => 'actuated-sludge-technology',
            ],

            'submerged-aerated-fixed-film-bio-reactor' => [
                'seo_titleTag' => 'Submerged Aerated Fixed Film | Sparkle Clean Tech.',
                'seo_keywords' => 'Submerged Aerated Fixed Film Bio Reactor (SAFF), Submerged Aerated Fixed Film Bio Reactor, Waste Water Treatment Plant, Sewage Treatment Plant Manufacturers, Waste Water Treatment Plant Manufacturers',
                'seo_metaDesc' => '(SAFF) is a cost-effective method of waste water treatment and sewage sanitation that is primarily used in residential and commercial complexes.',
                'product_heading' => 'Submerged Aerated Fixed Film Bio Reactor - SAFF',
                'product_image' => 'submerged_aerated_fixed_film_bio_reactor.jpg',
                'product_imageAlt' => 'Submerged Aerated Fixed Film Bio Reactor (SAFF)',
                'product_url' => route('products','submerged-aerated-fixed-film-bio-reactor'),
                'product_desc' => [
                    0 => 'Submerged Aerobic Fixed Film Reactor (SAFF) is a cost-effective method of waste water treatment and sewage sanitation that is primarily used in residential and commercial complexes.  SAFF process is attached growth type aerobic biological process which uses corrugated inert UV stabilized PVC media. Unlike other aerobic processes of suspended growth principally it provides higher mechanical surface area due to corrugation on media surface. This higher surface area helps biomass microbes for rapid digestion of biomass.',
                    1 => 'In the wastewater industry, SAFF Technology is used commonly for  commercial and residential sewage sanitation / waste water treatment, particularly for small to medium range flow requirements. The air for process is supplied through mechanical aeration system arrangement which consist of blower and diffusers. The structured SAFF media arranged in reactor is fixed with bottom support arrangement.',
                    2 => '
                        <ul>
                            <p>Advantage of SAFF process</p>
                            <li>MLSS concentration is much higher than what is normally achieved in aeration system of ASP process.</li>
                            <li>Higher loading of BOD on the media enables to reduce the aeration tank size. SAFF requires 25-40% lesser tank volume as compared to activated sludge process.</li>
                            <li>Cross-corrugation pattern of media ensures that air bubble travels in zigzag fashion, thus increasing the bubble travel path and thereby increasing the oxygen transfer rates.</li>
                            <li>SAFF system takes higher shock loads without reducing the plant performance because of large quantity of MLSS available inside the reactor.</li>
                            <li>Rate of sludge generation is normally lesser as compared to conventional system.</li>
                            <li>Life of SAFF system is long (about 10-15 years) as inert PVC media material is used. Non pressurized system.</li>
                            <li>This process is modification of activated sludge process which have eliminated its limitations.</li>
                            <li>All these process produces better quality treated wastewater than conventional activated sludge process.</li>
                            <li>Easily meets discharge norms.</li>
                            <li>Odour problems, maintenance problems, are eliminated.</li>
                            <li>High MLSS – Less Space required for the treatment.</li>
                            <li>SAFF process able to achieve 95-98% BOD reduction.</li>

                            <p>Due to above advantages the SAFF process is used commonly in package systems where compactness of treatment is key factor.</p>
                        </ul>',
                ],
                'technology' => 'attached-growth-process-technology',
            ],
            'moving-bed-bioreactor' => [
                'seo_titleTag' => 'Moving Bed Bioreactor | Sparkle Clean Tech',
                'seo_keywords' => 'Moving Bed Bioreactor (MBBR), Moving Bed Bioreactor, Waste Water Treatment Plant, Waste Water Treatment Plant Manufacturers, Water Treatment Plant india, Waste water recycling system, Domestic water treatment',
                'seo_metaDesc' => 'MBBR as the name suggests is a high rate attached growth aerobic treatment system wherein the bacterial growth takes place on a inert PP media.',
                'product_heading' => 'Moving Bed Bioreactor - MBBR',
                'product_image' => 'moving_bed_bioreactor.jpg',
                'product_imageAlt' => 'Moving Bed Bioreactor (MBBR)',
                'product_url' => route('products','moving-bed-bioreactor'),
                'product_desc' => [
                    0 => 'MBBR (Moving bed biofilm reactor) as the name suggests is a high rate attached growth aerobic treatment system wherein the bacterial growth takes place on a inert PP media. MBBR process uses the floating type plastic media for the attached growth process. Treatment units based on MBBR are operating successfully worldwide, as the technology is rugged and simple to operate. Units can be pre-assembled for rapid on-site installation. The major advantages include a compact, efficient design (less than a half of conventional plants), low sludge generation, low odor and low visual impact, and simple maintenance requirements. Like SAFF process the basic principle of treatment is attached growth which is carried out on media surface which is extensively corrugated specialized structure. Sparkle offers various grades of MBBR reactor media i.e. cylindrical, Spiral, Spiral media, etc.',
                    1 => '
                        <ul>
                            <p>Advantage of MBBR process</p>
                            <li>MLSS concentration is much higher than what is normally achieved in aeration system of ASP process.</li>
                            <li>Higher loading of BOD on the media enables to reduce the aeration tank size. MBBR requires 60 % lesser tank volume as compared to activated sludge process.</li>
                            <li>Based on attached growth process, where media is floating in aeration tank, hence it provides maximum surface area.</li>
                            <li>MBBR system takes higher shock loads without reducing the plant performance because of large quantity of MLSS available inside the reactor.</li>
                            <li>Rate of sludge generation is normally lesser as compared to conventional system.</li>
                            <li>Life of MBBR system is long (about 10-15 years) as inert PVC media material is used. Non pressurized system.</li>
                            <li>All these process produces better quality treated wastewater than conventional activated sludge process.</li>
                            <li>Easily meets discharge norms.</li>
                            <li>Space requirement is less. Treatment units can be accommodated in smallest available area.</li>
                            <li>Treated waste water can be reused for various applications like: flushing in toilets, gardening, road washing, car washing, construction activities after softening treatment it can reused for cooling towers makeup etc.</li>
                            <li>Odor problems, maintenance problems, are eliminated.</li>
                            <li>High MLSS – Less Space required for the treatment.</li>
                            <li>Due to use of diffused aeration power consumption is less. Small reactor size also helps to reduce power requirement, maintenance problems</li>
                            <li>Treatment is principally based on most proven activated sludge process.</li>
                            <li>MBBR process able to achieve 95-98% BOD reduction.</li>

                            <p>Due to above advantages the SAFF process is used commonly in package systems where compactness of treatment is key factor.</p>
                        </ul>',
                ],
                'technology' => 'attached-growth-process-technology',
            ],

            'membrane-bio-reactor' => [
                'seo_titleTag' => 'Membrane Bio Reactor | Sparkle Clean Tech',
                'seo_keywords' => 'Moving Bed Bioreactor India, Ultrafiltration Manufacturers, Waste Water Treatment Plant, Waste water recycling system, Domestic water treatment',
                'seo_metaDesc' => 'Membrane Bio Reactor (MBR) is a combination of two basic processes i.e. biological degradation and membrane separation in to a single process',
                'product_heading' => 'Membrane Bio Reactor - MBR',
                'product_image' => 'mbr.jpg',
                'product_imageAlt' => 'Membrane Bio Reactor',
                'product_url' => route('products','membrane-bio-reactor'),
                'product_desc' => [
                    0 => "Membrane Bio Reactor (MBR) is a combination of two basic processes i.e. biological degradation and membrane separation in to a single process where suspended solids and microorganisms responsible for biodegradation are separated from the treated water by membrane filtration unit.",
                    1 => 'Filtration based on UF or MF membranes is key for solid liquid seperation in MBR process. The Concentration of biomass is maintained very high in MBR systems. due to high MLSS the process reaction time is considerably low and optimum. Usually filtration is carried out by two different methods which defines the types of MBR process i.e. Side stream MBR and submerged MBR.',
                    2 => "Both types of MBR's have their unique advantages and sparkle can offer both types of MBR configurations. The systems  configurations are chosen by considering the customer requirements and waster characteristics.",
                    3 => "The MBR system is considered as most effiecient and modern wastewater treatment technology and known for various advantages over other treatment processes",
                    4 => '<ul>
                            <li>Compact design with smallest footprint. MBR process involves higher MLSS hence reaction tank is 75 % smaller than conventional  extended aeration process tank.</li>
                            <li>Less treatment units required. Low space requirement</li>
                            <li>Treated water quality after MBR is excellent as it is directly filtered through  ultra filtration or microfiltration membranes.</li>
                            <li>No separate tertiary treatment required.</li>
                            <li>Rate of sludge generation is normally lesser as compared to conventional system.</li>
                            <li>BOD values of treated water is very low and hence waste water can be reused easily.</li>
                            <li>Negligible (almost zero) sludge production</li>
                            <li>Rapid Startup</li>
                            <li>Modular/ Retrofit , system can be enhanced for capacity expansion easily.</li>
                        </ul>',
                ],
                'technology' => 'membrane-bio-reactor-technology',
            ],

            'degasser' => [
                'seo_titleTag' => 'Degasser Product | Sparkle Clean Tech Pvt.Ltd.',
                'seo_keywords' => 'Degasser, Waste Water Treatment Plant, Waste water recycling system, Domestic water treatment',
                'seo_metaDesc' => 'Degasser breaks weak carbonic acid into carbondioxide and water. The Degasser column has ballrings to increase the contact area.',
                'product_heading' => 'Degasser',
                'product_imageAlt' => 'Degasser',
                'product_image' => 'degasser.jpg',

                'product_url' => route('products','degasser'),
                'product_desc' => [
                    0 => 'Degasser breaks weak carbonic acid into carbondioxide and water. The unit operation used is stripping. The weak acid, either from weak acid cation or strong acid anion is introduced from the top of the degasser column. The Degasser column has ballrings to increase the contact area. ',
                    1 => 'Air is blown from the bottom of the degasser tower. The air will split the Carbonic acid into carbondioxide and water , Co2 will be vented of from the degasser tower and the water will be collected in a tank. Degassed tower considered in a DM water system or in D Alclysing system when the alcalynity in the water is very high and the pay back of degasser tower is favorable.',
                ],
                'technology' => 'other-technologies',
            ],
            'nano-filtration' => [
                'seo_titleTag' => 'Nano Filtration Product | Sparkle Clean Tech Pvt.Ltd.',
                'seo_keywords' => 'Nano Filtration Plant, RO Plant Manufacturers, Ultrafiltration Manufacturers, Nano Filtration plant manufacturers, Nano Filtration plant manufacturers in india',
                'product_imageAlt' => 'Nano Filtration',
                'seo_metaDesc' => 'Nano filtration is a stage of filtration between UF and RO where semi permeable membrane rejescts high molecular weight salts.',
                'product_heading' => 'Nano Filtration',
                'product_image' => 'nano_filtration.jpg',
                'product_url' => route('products','nano-filtration'),
                'product_desc' => [
                    0 => 'Nano filtration is a stage of filtration between UF and RO where semi permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e., calcium and magnesium salts from water. It finds its utility as prefiltration to RO Systems and filtration for boiler feed water. The Principle used is same as that of Reverese Osmosis.',
                ],
                'technology' => 'other-technologies',
            ],
            'ultra-violet-system' => [
                'seo_titleTag' => 'Ultra Violet System Product | Sparkle Clean Tech Pvt.Ltd.',
                'seo_keywords' => 'Ultra Violet System, ultraviolet water system, Domestic water treatment, Water Treatment Plant india',
                'seo_metaDesc' => 'UV System is also one of the maseares for the disinfecteant of water. Water is passed through the UV light, which eleminents bactreia and viruses.',
                'product_heading' => 'Ultra Violet System',
                'product_image' => 'ultra_violet_system.jpg',
                'product_imageAlt' => 'Ultra Violet System',
                'product_url' => route('products','ultra-violet-system'),
                'product_desc' => [
                    0 => 'UV System is also one of the maseares for the disinfecteant of water. Water is passed through the UV light, which eliminates bactreia and viruses. UV is an electro magnetic radiation, having radiation from 10nm to 400nm. UV rays penetrate through harmful bacteria in water and eliminate them. Disinfecting through UV light is a very simple and effective method. UV system destroy 99.99% harmful microorganism without adding any chemicals. Since there is no chemical being added water does not change its taste or odour. ',
                ],
                'technology' => 'other-technologies',
            ],
            'ozonator' => [
                'seo_titleTag' => 'Ozonator Product | Sparkle Clean Tech Pvt.Ltd.',
                'seo_keywords' => 'Ozonator, Ozonator system, Domestic water treatment, Water Treatment Plant india, ozonator manufacturer in mumbai',
                'seo_metaDesc' => 'Ozone is an unstable molecule which readily gives up one atom of oxygen providing a powerful oxidizing agent which is toxic to most waterborne organisms.',
                'product_heading' => 'Ozonator',
                'product_image' => 'ozonator.jpg',
                'product_url' => route('products','ozonator'),
                'product_imageAlt' => 'Ozonator Product',
                'product_desc' => [
                    0 => 'Ozone is an unstable molecule which readily gives up one atom of oxygen providing a powerful oxidizing agent which is toxic to most waterborne organisms. It is a very strong, disinfectant that is widely used. It is a very good disinfectant. Ozone is made by passing oxygen through ultraviolet light or a "cold" electrical discharge. To use ozone as a disinfectant, it must be created on-site and dosed in to the water. As compared to chlorine the issue of odour and smell is lesser. Ozone though is a very good disinfectant does not leave any disinfectant in residual water. This may be termed as advantage as well as disadvantage. It is applied as an anti-microbiological agent for the treatment, storage, and processing of foods.',
                ],
                'technology' => 'other-technologies',
            ],
            'edi' => [
                'seo_titleTag' => 'Electro Di Ionization Product | Sparkle Clean Tech Pvt.Ltd.',
                'seo_keywords' => 'Ion Exchange, Domestic water treatment, Water Treatment Plant india, Pressure Sand Filtrations water Treatment',
                'seo_metaDesc' => 'Processes like Sand Filter /Ultrafiltration / RO are the pressure driven process, whereas electrically driven approach encompasses electro di ionization.',
                'product_heading' => 'EDI',
                'product_imageAlt' => 'Electro Di Ionization',
                'product_image' => 'electro_di_ionization.jpg',
                'product_url' => route('products','edi'),
                'product_desc' => [
                    0 => 'Processes like Sand Filter /Ultrafiltration / Reverse Osmosis are the pressure driven process, whereas electrically driven approach encompasses electro-dialysis & electro di ionization. This Electro di Ionization process is generally applied when aim is to remove the ions (Cation & Anion) from water, & this is been achieved through the selective control & transport of ion species.',
                    1 => 'The fundamental principal behind electrically driven process is the passage of ions through a selective barrier (Ion Exchange Membrane) due to driving force (Electric field). Ion Exchange membranes play a critical role in this process & they are responsible for accepting & rejecting ions in the establishment of dilute & concentrate compartments. Electro di ionization is the process that based on selective migration of ions in solutions through the ion exchange membranes under activation of electric field.',
                    2 => 'This is a continuous process (Generation of process water as well as online regeneration) hence the same is also called as CEDI Technology (Continuous De Electro Ionization) CEDI is the most popular technology for electrically driven process in industries (Pharma Sector / Power Sector) as it separates the undesired ions from aqueous solutions at low operational cost & with the advantage that it does not generates the residues.',
                ],
                'technology' => 'other-technologies',
            ],
        ];
    }

    public function technologies()
    {
        $technology_name = Route::currentRouteName();
        $products = [];
        $technology_desc_block = [];

        if($technology_name == 'depth-filtration-technology'){
            $seo_titleTag = 'Depth Filtration Technology | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Depth filter are the variety of filters that use a porous filtration medium to retain particles throughout the medium,rather than just on the surface of it';
            $technology_title = 'Depth Filtration';
            $technology_desc_block = [
                0 => 'Depth filters are the variety of filters that use a porous filtration medium to retain particles throughout the medium, rather than just on the surface of it. These filters are commonly used when the water to be filtered contains a load of particles because, in comparison to the other types of filters, they can retain a large mass of particles before becoming clogged.',
                1 => 'Depth filtration works by collecting particles within the filter media and passing a clean outlet flow of the fluid. Depth filtration typified by multiple porous layers with depth are used to capture the solid contaminants from the liquid phase.',
                2 => 'Due to the tortuous and channel-like nature of the filtration medium, the particles are retained throughout the medium within its structure, as opposed to on the surface. Depth filters pose the added advantage that they are able to attain a high quantity of particles without compromising the separation efficiency. Depth filters are commonly characterized by the sand filter and have the ability to be used with substantially higher filter rates than in other designs. It is these characteristics that have cemented the use and popularity of depth filters as an effective medium for separation. With ongoing advances in process technologies, depth filter designs are continuously adapting and improving to meet the needs of industry.',
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='depth-filtration-technology';})->toArray();
        }
        elseif($technology_name == 'micro-membrane-technology'){
            $seo_titleTag = 'Micro - Membrane Filtration Technology | Sparkle Clean Tech.';
            $seo_metaDesc = 'Micron filtration is to segregate or separate particulate matter based on the size of the particulate matter. Sewing, screening or surface filtration';
            $technology_title = 'Micro / Membrane Filtration';
            $technology_desc_block = [
                0 => "Micron filtration is to segregate or separate particulate matter based on the size of the particulate matter. Sewing, screening or surface filtration are also the types of surface filtration based on size of the particulate matter. When the requirement of filtration is less than 0.2 microns, then membrane filtration is also used. In water and waste water treatment, this type of filters are very critical. It acts as a guard filter to further membrane treatment. Micron / membrane filtration also restricts the presence of the organics, bacteria and virus.",
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='micro-membrane-technology';})->toArray();
        }
        elseif($technology_name == 'ion-exchange-technology'){
            $seo_titleTag = 'Ion Exchange Technology | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Ion exchange is a resin based process, the inner bids of resin carry either positive or negative ion which can be exchanged with the ion of incoming water.';
            $technology_title = 'Ion Exchange';
            $technology_desc_block = [
                0 => 'Ion exchange is a resin based process, the inner bids of resin carry either positive or negative ion which can be exchanged with the ion of incoming water. The dissolved salt or solids comprising of positive or negative ions are passed through cation and anion resins to achieve desired results.',
                1 => 'There are various combinations of Ion exchange Columns depending upon raw water, product water and economy of operation. The demineralisation process can be carried out by 2 bed system, 3 bed system and combination of Degasser tower, as and when required. Another popular utility of ion exchange process is a softener. Softening resins have sodium ion concentration as an ion to be exchanged with calcium and magnesium ions. So by replacing calcium and magnesium ions, which constitutes hardness of the water. This type of resins can make the water soft. All types of resins are regeneratable by the help of weak acid, weak base and or salt solution.'
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='ion-exchange-technology';})->toArray();
        }
        elseif($technology_name == 'ro-technology'){
            $seo_titleTag = 'RO Technology | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Osmosis is defined as a water with low concentration, passes through a semi permeable membrane and forms a equilibrium with water of higher concentration.';
            $technology_title = 'RO Plant';
            $technology_desc_block = [
                0 => 'Osmosis is defined as a water with low concentration, passes through a semi permeable membrane and forms a equilibrium with water of higher concentration available on the other side of the membrane. The pressure at which this phenomenon takes place is called Osmotic Pressure. For purification of water, the phenomenon is reversed i.e., pressure higher than osmotic pressure is applied to the concentrated liquid which will pass through a semi permeable membrane resulting into a purer form of water/liquid.',
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='ro-technology';})->toArray();
        }
        elseif($technology_name == 'setting-coagulation-flocculation-oil-seperation-technology'){
            $seo_titleTag = 'Coagulation-Flocculation Technology | Sparkle Clean Tech Pvt.Ltd';
            $seo_metaDesc = 'Coagulation is predominantly used in effluent water treatment processes for separation of free oil, solids removal, water clarification & lime softening.';
            $technology_title = 'Setting / Coagulation / Flocculation';
            $technology_desc_block = [
                0 => 'Coagulation is predominantly used in effluent water treatment processes for separation of free oil, solids removal, water clarification, lime softening, sludge thickening, and solids dewatering. The negative electrical charge on particles are neutralized, which destabilizes the forces keeping colloids apart.',
                1 => 'Clari Floccution is a combination of clarifier and flocculation. There is a separate chamber provided for dossing flocculants in the unit. There are many types of Clari Flocculators like Central drive, peripheral drive, agitator gate type etc.',
                2 => 'An oil skimmer is a device that separates free and floating type oil from wastewater/ effluent. A common application is removing oil floating on water. Oil skimmers are different from oil water separators and the primary intension of skimmer is to skim-off the oil layer which is separated by phase separation process which is similar to oil water separators. ',
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='setting-coagulation-flocculation-oil-seperation-technology';})->toArray();
        }
        elseif($technology_name == 'oil-seperation-technology'){
            $seo_titleTag = 'Oil Seperation Technology | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'As a special treatment for oil removal from oil rich effluent additional equipment are employed.The conventional treatment like coagulation / flocculation';
            $technology_title = 'Oil Seperation';
            $technology_desc_block = [
                0 => 'As a special treatment for oil removal from oil rich effluent additional equipment are employed.',
                1 => 'The conventional treatment like coagulation / flocculation becomes the primary treatment for oil rich effluent.',
                2 => 'TPI / CPI , followed by IGF / Dissolved Air Flotation are installed to treat emulsified oil. The above water is then treated in a Walnut shell filter which reduces the oil content effluent to around 10ppm.',
                3 => 'Ultrafiltration is the final / polishing treatment given to the above treated effluent. The elaborated treatment as above enables the water / effluent to be the standard for the injection.'
            ];

            $products = collect($this->getProducts())->filter(function($product)
            { 
                return  in_array($product['product_heading'], ['Nut Shell Filter - NSF','Oil Skimmer','Corrugulated Plate Intersected - CPI','Inducted Gas Flotation - IGF']);
            });
        }
        elseif($technology_name == 'actuated-sludge-technology'){
            $seo_titleTag = 'Activated Sludge Process Technology | Sparkle Clean Tech Pvt.Ltd';
            $seo_metaDesc = 'The activated sludge process is a process for treating sewage and industrial wastewaters using air and a biological floc composed of bacteria and protozoa.';
            $technology_title = 'Activated Sludge Process';
            $technology_desc_block = [
                0 => 'The activated sludge process is a process for treating sewage and industrial wastewaters using air and a biological floc composed of bacteria and protozoa.',
                1 => 'In a sewage (or industrial wastewater) treatment plant, the activated sludge process is a biological process that can be used for one or several of the following purposes: oxidizing carbonaceous biological matter, oxidizing nitrogenous matter: mainly ammonium and nitrogen in biological matter, removing nutrients (nitrogen and phosphorus).',
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='actuated-sludge-technology';})->toArray();
        }
        elseif($technology_name == 'attached-growth-process-technology'){
            $seo_titleTag = 'Attached Growth Process Technology | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Wastewater treatment processes in which the microorganisms and bacteria treating the wastes are attached to the media in the reactor.';
            $technology_title = 'Attached Growth Process';
            $technology_desc_block = [
                0 => 'Wastewater treatment processes in which the microorganisms and bacteria treating the wastes are attached to the media in the reactor.',
                1 => 'The wastes being treated flow over the media. Trickling filters and rotating biological contactors are attached growth reactors.',
                2 => 'These reactors can be used for BOD removal, nitrification, and denitrification.',
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='attached-growth-process-technology';})->toArray();
        }
        elseif($technology_name == 'membrane-bio-reactor-technology'){
            $seo_titleTag = 'Membrane Bio Reactor Technology | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Membrane Bio Reactor (MBR) is a combination of two basic processes i.e. biological degradation and membrane separation.';
            $technology_title = 'Membrane Bio Reactor ( MBR )';
            $technology_desc_block = [
                0 => "Membrane Bio Reactor (MBR) is a combination of two basic processes i.e. biological degradation and membrane separation. They are merged into a single process where suspended solids and microorganisms responsible for biodegradation are separated from the treated water by membrane filtration unit.",
                1 => 'Filtration based on UF or MF membranes is key for solid liquid separation in MBR process. The Concentration of biomass is maintained very high in MBR systems. Due to high MLSS the process reaction time is considerably low and optimum. Usually filtration is carried out by two different methods which defines the types of MBR process i.e. Side stream MBR and submerged MBR.',
            ];
            
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='membrane-bio-reactor-technology';})->toArray();
        }
        elseif($technology_name == 'other-technology'){
            $seo_titleTag = 'Others Technologies | Sparkle Clean Tech Pvt.Ltd.';
            $seo_metaDesc = 'Various other technologies are used in water management treatment. For instance, Degasser tower breaks weak carbonic acid into carbon dioxide and water.';
            $technology_title = 'Others';
            $technology_desc_block = [
                0 => 'Various other technologies are used in water management treatment. For instance, Degasser tower breaks weak carbonic acid into carbon dioxide and water. Degassed tower is considered in a DM water system or in D Alkalizing system when the alkalinity in the water is very high and the pay back of Degasser tower is favorable.',
                1 => 'Nano Filtration  is a stage of filtration between UF and RO where semi permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e, calcium and magnesium salts from water.',
                2 => 'In Ultra Violet System Nano filtration is a stage of filtration between UF and RO where semi permeable membrane rejects high molecular weight salts. Nano filtration is essentially used for removal of hardness i.e., calcium and magnesium salts from water.',
                3 => 'Ozonator is an unstable molecule which readily gives up one atom of oxygen providing a powerful oxidizing agent which is toxic to most waterborne organisms. It is a very strong, disinfectant that is widely used.',
                4 => 'Processes like Sand Filter /Ultrafiltration / Reverse Osmosis are the pressure driven process, whereas electrically driven approach encompasses electro-dialysis & electro di ionization. This Electro di Ionization process is generally applied when aim is to remove the ions (Cation & Anion) from water, & this is been achieved through the selective control & transport of ion species. CEDI is the most popular technology for electrically driven process in industries (Pharma Sector / Power Sector) as it separates the undesired ions from aqueous solutions at low operational cost & with the advantage that it does not generates the residues.', 
            ];
            $products = collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='other-technologies';})->toArray();
        }
        else {
            App::abort(404);
            exit;
        }

        return view('web_pages.technology', [
            'technology_title' => $technology_title,
            'technology_desc_block' => $technology_desc_block,
            'products' => $products,
            'seo_titleTag' => $seo_titleTag,
            'seo_metaDesc' => $seo_metaDesc
        ]);
    }

    /*Footer Form*/
    public function sendSubscription(Requests\SendSubscriptionRequest $sendSubscriptionRequest)
    {

        $data = [
            'first_name' => $sendSubscriptionRequest['first_name'],
            'last_name' => $sendSubscriptionRequest['last_name'],
            'email' => $sendSubscriptionRequest['email'],
        ];

        $data['company_name'] = isset($sendSubscriptionRequest['company_name']) ? $sendSubscriptionRequest['company_name'] : null;


        /*$sendToEmail = 'saurabh.pralhad.ghule@gmail.com';*/
       $sendToEmail = 'info@sparklecleantech.com';


        Mail::send('emails.footer_form_details', ['data' => $data], function ($message) use ($sendToEmail, $data, $sendSubscriptionRequest) {
            $message->to($sendToEmail)->subject('Newsletter subscription');
        });

        $useremail = $sendSubscriptionRequest['email'];

        Mail::send('emails.newsletter_subscription_acknowledgement', ['data' => $data,'useremail' => '$useremail'], function ($message) use ($sendToEmail, $data, $useremail) {
            $message->to($useremail)->subject('Sparkle Clean Tech Newsletter Subscription Acknowledgement');
        });

        return response()->json(['status' => 'success'], 200);
    }
    /*End Footer Form*/

    public function siteMap()
    {
        return view('web_pages.site_map');
    }

    public function products($product_slug = null)
    {
        $products = [
            'Ion Exchange' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='ion-exchange-technology';})->toArray(),

            'Setting / Coagulation / Flocculation' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='setting-coagulation-flocculation-oil-seperation-technology';})->toArray(),

            'Oil Seperation' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='oil-seperation-technology';})->toArray(),

            'Depth Filtration' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='depth-filtration-technology';})->toArray(),

            'Micro / Membrane Filtration' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='micro-membrane-technology';})->toArray(),

            'RO Plant' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='ro-technology';})->toArray(),

            'Activated Sludge Process' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='actuated-sludge-technology';})->toArray(),

            'Attached Growth Process' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='attached-growth-process-technology';})->toArray(),

            'Membrane Bio Reactor' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='membrane-bio-reactor-technology';})->toArray(),

            'Others' => collect($this->getProducts())->filter(function($product)
                { return  $product['technology']=='other-technologies';})->toArray(),
        ];

        if($product_slug == null)
        {
            return view('web_pages.products_listing')->with([
                'products' => $products,
                'product_slug' => $product_slug,
            ]);
        }
        else
        {
            $product = $this->getProducts();
            if(isset($product[$product_slug])){
                return view('web_pages.product')->with([
                    'product' => $product[$product_slug],
                    'product_slug' => $product_slug,
                ]);
            }
            else{
                abort('404');
            }
        }
    }

    public function downloads()
    {
        return view('web_pages.downloads');
    }
}
