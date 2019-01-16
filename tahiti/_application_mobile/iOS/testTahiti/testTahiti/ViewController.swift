//
//  ViewController.swift
//  testTahiti
//
//  Created by Thomas Goward on 14/01/2019.
//  Copyright © 2019 Thomas Goward. All rights reserved.
//

import UIKit
import WebKit

var testwebsite = "http://172.20.10.2./projecttahiti/tahiti/"
var googlewebsite = "https://www.google.com"
var website = "http://192.168.10.1/tahiti/"

class ViewController: UIViewController {
    
    @IBOutlet weak var Webpage: WKWebView!
    let Myurl = URL(string: testwebsite)
    
    override func viewDidLoad() {
        super.viewDidLoad()
        let request = URLRequest(url: Myurl!)
        Webpage.load(request)
    }
}
